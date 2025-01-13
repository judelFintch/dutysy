<?php

namespace App\Http\Livewire\Transaction;

use Livewire\Component;
use App\Models\TransactionMoney as Transaction;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\CompanyInfo;

class TransactionReportComponent extends Component
{
    public $transactions = [];
    public $startDate;
    public $endDate;
    public $company;

    public function mount()
    {
        // Initialisation des dates pour filtrer
        $this->startDate = now()->startOfMonth()->toDateString();
        $this->endDate = now()->toDateString();

        // Charger les informations de l'entreprise
        $this->company = CompanyInfo::first();

        // Charger les transactions
        $this->loadTransactions();
    }

    public function loadTransactions()
    {
        // Validation des dates
        if (!$this->startDate || !$this->endDate) {
            $this->addError('date_range', 'Les dates de début et de fin sont obligatoires.');
            return;
        }

        if ($this->startDate > $this->endDate) {
            $this->addError('date_range', 'La date de début ne peut pas être postérieure à la date de fin.');
            return;
        }

        // Appliquer le filtre par date
        $this->transactions = Transaction::with(['fromAccount', 'toAccount'])
            ->whereBetween('processed_at', [$this->startDate, $this->endDate])
            ->orderBy('processed_at', 'desc')
            ->get();
    }

    public function generatePDF()
    {
        $company = $this->company;
        $transactions = $this->transactions;

        // Charger la vue dans un PDF
        $pdf = Pdf::loadView('livewire.transaction.pdf-transaction', compact('transactions', 'company'));

        // Télécharger le fichier PDF
        return response()->streamDownload(
            fn() => print ($pdf->output()),
            'rapport_transactions.pdf'
        );
    }

    public function render()
    {
        return view('livewire.transaction.transaction-report-component', [
            'transactions' => $this->transactions,
            'company' => $this->company,
        ]);
    }
}
