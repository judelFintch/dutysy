<?php

namespace App\Http\Livewire\Rapport;

use App\Models\Mouvements as Mouvements;
use App\Models\Clients  as Clients;
use Carbon\Carbon;
use Illuminate\Validation\Rule;

use Livewire\Component;

class Rapport extends Component
{
    public $begin_date;
    public $end_date;
    public $selectOpType;
    public $selectClientId;
    public $searchQuery;
    public $devise = 'usd';
    public $includeAllClients = true;
    public $includeAllOperations = true;

    public function mount()
    {
        // Par défaut, aucun filtre de date pour afficher tout l'historique
        $this->begin_date = null;
        $this->end_date = null;
        $this->includeAllClients = true;
        $this->includeAllOperations = true;
    }

    protected function rules()
    {
        return [
            'begin_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:begin_date',
            'selectOpType' => ['nullable', Rule::in(['int', 'out']), Rule::requiredIf(function () {
                return !$this->includeAllOperations;
            })],
            'selectClientId' => ['nullable', 'integer', 'exists:clients,id', Rule::requiredIf(function () {
                return !$this->includeAllClients;
            })],
            'includeAllClients' => 'boolean',
            'includeAllOperations' => 'boolean',
        ];
    }

    public function submit()
    {
        $this->validate();
        // Logique de soumission
    }

    public function updatedIncludeAllClients($value)
    {
        if ($value) {
            $this->selectClientId = null;
        }
    }

    public function updatedIncludeAllOperations($value)
    {
        if ($value) {
            $this->selectOpType = null;
        }
    }

    public function resetFilters()
    {
        $this->reset([
            'begin_date',
            'end_date',
            'selectOpType',
            'selectClientId',
            'searchQuery',
        ]);

        $this->includeAllClients = true;
        $this->includeAllOperations = true;
    }

    public function render()
    {
        $mouvements = $this->buildMouvementQuery()->get();
        $clients = Clients::all();
        return view('livewire.rapport.rapport', compact('mouvements', 'clients'));
    }

    protected function buildMouvementQuery()
    {
        $query = Mouvements::with('dossier');

        if (!empty($this->begin_date)) {
            $query->where('created_at', '>=', Carbon::parse($this->begin_date)->startOfDay());
        }

        if (!empty($this->end_date)) {
            $query->where('created_at', '<=', Carbon::parse($this->end_date)->endOfDay());
        }

        if (!$this->includeAllOperations && !empty($this->selectOpType)) {
            $query->where('type', $this->selectOpType);
        }

        if (!$this->includeAllClients && !empty($this->selectClientId)) {
            $query->whereHas('dossier', function ($query) {
                $query->where('client_id', $this->selectClientId);
            });
        }

        if (!empty($this->searchQuery)) {
            $search = '%' . $this->searchQuery . '%';
            $query->where('motif', 'like', $search);
        }

        return $query->orderBy('created_at');
    }

    public function exportJournal()
    {
        $this->validate();

        $mouvements = $this->buildMouvementQuery()->get();

        $filename = 'journal_caisse_' . now()->format('Ymd_His') . '.csv';

        return response()->streamDownload(function () use ($mouvements) {
            $handle = fopen('php://output', 'w');

            fputcsv($handle, [
                'Date',
                'Dossier',
                'Motif',
                'Débit USD',
                'Crédit USD',
                'Débit CDF',
                'Crédit CDF',
                'Solde USD',
                'Solde CDF',
                'Bénéficiaire',
            ]);

            $runningUsd = 0;
            $runningCdf = 0;

            foreach ($mouvements as $mvt) {
                $debitUsd = $mvt->type === 'int' ? $mvt->amount_usd : 0;
                $creditUsd = $mvt->type === 'out' ? $mvt->amount_usd : 0;
                $debitCdf = $mvt->type === 'int' ? $mvt->amount_cdf : 0;
                $creditCdf = $mvt->type === 'out' ? $mvt->amount_cdf : 0;

                $runningUsd += $debitUsd;
                $runningUsd -= $creditUsd;

                $runningCdf += $debitCdf;
                $runningCdf -= $creditCdf;

                fputcsv($handle, [
                    Carbon::parse($mvt->created_at)->format('Y-m-d H:i'),
                    optional($mvt->dossier)->plaque ?? 'N/A',
                    $mvt->motif,
                    $debitUsd,
                    $creditUsd,
                    $debitCdf,
                    $creditCdf,
                    $runningUsd,
                    $runningCdf,
                    $mvt->beneficiaire,
                ]);
            }

            fclose($handle);
        }, $filename, [
            'Content-Type' => 'text/csv',
        ]);
    }
}
