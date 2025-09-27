<?php

namespace App\Http\Livewire\Rapport;

use App\Models\Mouvements as Mouvements;
use App\Models\Clients  as Clients;
use Carbon\Carbon;
use Illuminate\Support\Collection;
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
        $summary = $this->buildSummary($mouvements);
        $journalRows = $this->formatJournalRows($mouvements);
        $insights = $this->buildInsights($summary);

        return view('livewire.rapport.rapport', compact('mouvements', 'clients', 'summary', 'journalRows', 'insights'));
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


    protected function buildSummary(Collection $mouvements): array
    {
        $entries = $mouvements->where('type', 'int');
        $exits = $mouvements->where('type', 'out');

        $periodStart = $this->begin_date
            ? Carbon::parse($this->begin_date)
            : ($mouvements->count() ? Carbon::parse($mouvements->min('created_at')) : null);

        $periodEnd = $this->end_date
            ? Carbon::parse($this->end_date)
            : ($mouvements->count() ? Carbon::parse($mouvements->max('created_at')) : null);

        $durationDays = null;
        if ($periodStart && $periodEnd) {
            $durationDays = max(1, $periodStart->diffInDays($periodEnd) + 1);
        }

        $beneficiaryStats = $mouvements->filter(fn ($mvt) => !empty($mvt->beneficiaire))
            ->groupBy('beneficiaire')
            ->map->count()
            ->sortDesc();

        $motifStats = $mouvements->filter(fn ($mvt) => !empty($mvt->motif))
            ->groupBy('motif')
            ->map->count()
            ->sortDesc();

        $usdEntries = (float) $entries->sum('amount_usd');
        $usdExits = (float) $exits->sum('amount_usd');
        $cdfEntries = (float) $entries->sum('amount_cdf');
        $cdfExits = (float) $exits->sum('amount_cdf');

        return [
            'count' => $mouvements->count(),
            'entries_count' => $entries->count(),
            'exits_count' => $exits->count(),
            'usd' => [
                'entries' => $usdEntries,
                'exits' => $usdExits,
                'net' => $usdEntries - $usdExits,
            ],
            'cdf' => [
                'entries' => $cdfEntries,
                'exits' => $cdfExits,
                'net' => $cdfEntries - $cdfExits,
            ],
            'period' => [
                'start' => $periodStart,
                'end' => $periodEnd,
                'duration_days' => $durationDays,
            ],
            'top_beneficiary' => $beneficiaryStats->keys()->first(),
            'top_beneficiary_count' => $beneficiaryStats->first(),
            'top_motif' => $motifStats->keys()->first(),
            'top_motif_count' => $motifStats->first(),
        ];
    }

    protected function buildInsights(array $summary): array
    {
        if (empty($summary['count'])) {
            return ['Aucun mouvement enregistré pour la période sélectionnée.'];
        }

        $insights = [];
        $periodStart = $summary['period']['start'];
        $periodEnd = $summary['period']['end'];
        if ($periodStart && $periodEnd) {
            $insights[] = sprintf(
                'Analyse du %s au %s (%d jour%s).',
                $periodStart->format('d/m/Y'),
                $periodEnd->format('d/m/Y'),
                $summary['period']['duration_days'] ?? 1,
                (($summary['period']['duration_days'] ?? 1) > 1 ? 's' : '')
            );
        }

        $usdNet = $summary['usd']['net'];
        $cdfNet = $summary['cdf']['net'];

        if ($usdNet > 0) {
            $insights[] = 'Le flux USD est excédentaire de ' . number_format($usdNet, 2, ',', ' ') . ' $.';
        } elseif ($usdNet < 0) {
            $insights[] = 'Le flux USD est déficitaire de ' . number_format(abs($usdNet), 2, ',', ' ') . ' $.';
        } else {
            $insights[] = 'Les flux USD sont équilibrés sur la période.';
        }

        if ($cdfNet > 0) {
            $insights[] = 'Le flux CDF est excédentaire de ' . number_format($cdfNet, 2, ',', ' ') . ' FC.';
        } elseif ($cdfNet < 0) {
            $insights[] = 'Le flux CDF est déficitaire de ' . number_format(abs($cdfNet), 2, ',', ' ') . ' FC.';
        } else {
            $insights[] = 'Les flux CDF sont équilibrés sur la période.';
        }

        if (!empty($summary['entries_count']) || !empty($summary['exits_count'])) {
            $insights[] = sprintf(
                '%d entrée(s) et %d sortie(s) enregistrées.',
                $summary['entries_count'],
                $summary['exits_count']
            );
        }

        if (!empty($summary['top_beneficiary'])) {
            $insights[] = sprintf(
                'Bénéficiaire le plus fréquent : %s (%d occurrence%s).',
                $summary['top_beneficiary'],
                $summary['top_beneficiary_count'],
                $summary['top_beneficiary_count'] > 1 ? 's' : ''
            );
        }

        if (!empty($summary['top_motif'])) {
            $insights[] = sprintf(
                'Motif dominant : %s (%d occurrence%s).',
                $summary['top_motif'],
                $summary['top_motif_count'],
                $summary['top_motif_count'] > 1 ? 's' : ''
            );
        }

        if (!empty($summary['period']['duration_days']) && $summary['period']['duration_days'] > 1) {
            $insights[] = sprintf(
                'Moyenne quotidienne des entrées : %s USD et %s FC.',
                number_format($summary['usd']['entries'] / $summary['period']['duration_days'], 2, ',', ' '),
                number_format($summary['cdf']['entries'] / $summary['period']['duration_days'], 2, ',', ' ')
            );
        }

        return $insights;
    }

    protected function formatJournalRows(Collection $mouvements): Collection
    {
        $runningUsd = 0;
        $runningCdf = 0;

        return $mouvements->map(function ($mvt) use (&$runningUsd, &$runningCdf) {
            $isEntry = $mvt->type === 'int';
            $debitUsd = $isEntry ? (float) $mvt->amount_usd : 0;
            $creditUsd = !$isEntry ? (float) $mvt->amount_usd : 0;
            $debitCdf = $isEntry ? (float) $mvt->amount_cdf : 0;
            $creditCdf = !$isEntry ? (float) $mvt->amount_cdf : 0;

            $runningUsd += $debitUsd;
            $runningUsd -= $creditUsd;
            $runningCdf += $debitCdf;
            $runningCdf -= $creditCdf;

            return [
                'model' => $mvt,
                'debit_usd' => $debitUsd,
                'credit_usd' => $creditUsd,
                'debit_cdf' => $debitCdf,
                'credit_cdf' => $creditCdf,
                'running_usd' => $runningUsd,
                'running_cdf' => $runningCdf,
            ];
        });
    }
}
