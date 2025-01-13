<?php

namespace App\Http\Livewire\Transaction;

use Livewire\Component;

use App\Models\TransactionMoney as Transaction;
use Barryvdh\DomPDF\Facade\Pdf;



class TransactionStoreComponent extends Component
{

    public $transactions = [];
    public $startDate;
    public $endDate;

    public function mount()
    {
        // Initialisation des dates pour filtrer
        $this->startDate = now()->startOfMonth()->toDateString();
        $this->endDate = now()->toDateString();
        $this->loadTransactions();
    }

    public function loadTransactions()
    {
        $this->transactions = Transaction::with(['fromAccount', 'toAccount'])
            ->whereBetween('processed_at', [$this->startDate, $this->endDate])
            ->get();
    }

    public function generatePDF()
    {
        $transactions = $this->transactions;

        // Charger la vue dans un PDF
        $pdf = Pdf::loadView('livewire.reports.transactions', compact('transactions'));

        // Télécharger le fichier PDF
        return response()->streamDownload(
            fn() => print ($pdf->output()),
            'rapport_transactions.pdf'
        );
    }

    public function render()
    {
        return view('livewire.transaction-report-component', [
            'transactions' => $this->transactions,
        ]);
    }
}
