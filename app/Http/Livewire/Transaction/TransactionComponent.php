<?php

namespace App\Http\Livewire\Transaction;

use Livewire\Component;
use App\Models\Caisses as Caisse;
use App\Models\TransactionMoney as Transaction;
use Illuminate\Support\Facades\DB;


class TransactionComponent extends Component
{
    public $from_account;
    public $to_account;
    public $amount_usd = 0;
    public $amount_cdf = 0;
    public $transaction_type = 'transfer';
    public $transaction_date;
    public $description;

    public $accounts; // Listes des caisses pour le formulaire

    public function mount()
    {
        $this->accounts = Caisse::all(); // Récupérer les caisses pour le dropdown
        $this->transaction_date = now()->toDateString();
    }

    public function processTransaction()
    {
        $this->validate([
            'from_account' => 'required|exists:caisses,id',
            'to_account' => 'required|exists:caisses,id|different:from_account',
            'amount_usd' => 'numeric|min:0',
            'amount_cdf' => 'numeric|min:0',
            'transaction_type' => 'required|in:transfer,deposit,withdrawal',
            'transaction_date' => 'required|date',
        ]);

        DB::beginTransaction();

        try {
            // Récupérer les caisses concernées
            $source = Caisse::findOrFail($this->from_account);
            $destination = Caisse::findOrFail($this->to_account);

            // Vérification et insertion USD
            if ($this->amount_usd > 0) {
                if ($this->amount_usd > $source->amount_usd) {
                    throw new \Exception("Fonds insuffisants en USD dans le compte source.");
                }

                // Débit et crédit pour USD
                $source->amount_usd -= $this->amount_usd;
                $destination->amount_usd += $this->amount_usd;

                // Enregistrement de la transaction USD
                Transaction::create([
                    'from_account_id' => $this->from_account,
                    'to_account_id' => $this->to_account,
                    'amount' => $this->amount_usd,
                    'currency' => 'USD',
                    'status' => 'completed',
                    'transaction_type' => $this->transaction_type,
                    'description' => $this->description,
                    'processed_at' => $this->transaction_date,
                ]);
            }

            // Vérification et insertion CDF
            if ($this->amount_cdf > 0) {
                if ($this->amount_cdf > $source->amount_cdf) {
                    throw new \Exception("Fonds insuffisants en CDF dans le compte source.");
                }

                // Débit et crédit pour CDF
                $source->amount_cdf -= $this->amount_cdf;
                $destination->amount_cdf += $this->amount_cdf;

                // Enregistrement de la transaction CDF
                Transaction::create([
                    'from_account_id' => $this->from_account,
                    'to_account_id' => $this->to_account,
                    'amount' => $this->amount_cdf,
                    'currency' => 'CDF',
                    'status' => 'completed',
                    'transaction_type' => $this->transaction_type,
                    'description' => $this->description,
                    'processed_at' => $this->transaction_date,
                ]);
            }

            // Sauvegarder les modifications
            $source->save();
            $destination->save();

            DB::commit();

            // Réinitialiser les champs et rafraîchir la page
            $this->reset(['from_account', 'to_account', 'amount_usd', 'amount_cdf', 'description']);
            session()->flash('message', 'Transactions effectuées avec succès.');
            return redirect()->route('transactions.index'); // Rafraîchit la page
        } catch (\Exception $e) {
            DB::rollBack();
            session()->flash('error', 'Erreur : ' . $e->getMessage());
        }
    }
    public function render()
    {
        return view('livewire.transaction.transaction-component');
    }
}
