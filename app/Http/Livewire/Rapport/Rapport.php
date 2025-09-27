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

        $filename = 'journal_caisse_' . now()->format('Ymd_His') . '.xls';
        $content = $this->generateExcelDocument($mouvements);

        return response($content, 200, [
            'Content-Type' => 'application/vnd.ms-excel',
            'Content-Disposition' => 'attachment; filename="' . $filename . '"',
            'Pragma' => 'public',
            'Cache-Control' => 'max-age=0',
        ]);
    }

    protected function generateExcelDocument($mouvements)
    {
        $rows = [];
        $runningUsd = 0;
        $runningCdf = 0;

        $rows[] = $this->excelRow([
            ['type' => 'String', 'value' => 'Date'],
            ['type' => 'String', 'value' => 'Dossier'],
            ['type' => 'String', 'value' => 'Motif'],
            ['type' => 'String', 'value' => 'Débit USD'],
            ['type' => 'String', 'value' => 'Crédit USD'],
            ['type' => 'String', 'value' => 'Débit CDF'],
            ['type' => 'String', 'value' => 'Crédit CDF'],
            ['type' => 'String', 'value' => 'Solde USD'],
            ['type' => 'String', 'value' => 'Solde CDF'],
            ['type' => 'String', 'value' => 'Bénéficiaire'],
        ], 'Header');

        foreach ($mouvements as $mvt) {
            $debitUsd = $mvt->type === 'int' ? (float) $mvt->amount_usd : 0;
            $creditUsd = $mvt->type === 'out' ? (float) $mvt->amount_usd : 0;
            $debitCdf = $mvt->type === 'int' ? (float) $mvt->amount_cdf : 0;
            $creditCdf = $mvt->type === 'out' ? (float) $mvt->amount_cdf : 0;

            $runningUsd += $debitUsd;
            $runningUsd -= $creditUsd;
            $runningCdf += $debitCdf;
            $runningCdf -= $creditCdf;

            $rows[] = $this->excelRow([
                ['type' => 'String', 'value' => Carbon::parse($mvt->created_at)->format('Y-m-d H:i')],
                ['type' => 'String', 'value' => optional($mvt->dossier)->plaque ?? 'N/A'],
                ['type' => 'String', 'value' => $mvt->motif],
                ['type' => 'Number', 'value' => $debitUsd],
                ['type' => 'Number', 'value' => $creditUsd],
                ['type' => 'Number', 'value' => $debitCdf],
                ['type' => 'Number', 'value' => $creditCdf],
                ['type' => 'Number', 'value' => $runningUsd],
                ['type' => 'Number', 'value' => $runningCdf],
                ['type' => 'String', 'value' => $mvt->beneficiaire],
            ]);
        }

        if ($mouvements->count()) {
            $rows[] = $this->excelRow([
                ['type' => 'String', 'value' => ''],
                ['type' => 'String', 'value' => ''],
                ['type' => 'String', 'value' => 'Total'],
                ['type' => 'Number', 'value' => $runningUsd],
                ['type' => 'String', 'value' => ''],
                ['type' => 'Number', 'value' => $runningCdf],
                ['type' => 'String', 'value' => ''],
                ['type' => 'String', 'value' => ''],
                ['type' => 'String', 'value' => ''],
                ['type' => 'String', 'value' => ''],
            ], 'Footer');
        }

        $rowsXml = implode("\n", $rows);

        $xml = <<<XML
<?xml version="1.0"?>
<?mso-application progid="Excel.Sheet"?>
<Workbook xmlns="urn:schemas-microsoft-com:office:spreadsheet"
    xmlns:o="urn:schemas-microsoft-com:office:office"
    xmlns:x="urn:schemas-microsoft-com:office:excel"
    xmlns:ss="urn:schemas-microsoft-com:office:spreadsheet"
    xmlns:html="http://www.w3.org/TR/REC-html40">
    <Styles>
        <Style ss:ID="Default" ss:Name="Normal">
            <Alignment ss:Vertical="Center" />
            <Font ss:FontName="Calibri" ss:Size="11" />
        </Style>
        <Style ss:ID="Header">
            <Alignment ss:Horizontal="Center" ss:Vertical="Center" />
            <Font ss:FontName="Calibri" ss:Size="11" ss:Bold="1" />
            <Interior ss:Color="#E1EDF7" ss:Pattern="Solid" />
        </Style>
        <Style ss:ID="Footer">
            <Font ss:FontName="Calibri" ss:Size="11" ss:Bold="1" />
            <Interior ss:Color="#F5F5F5" ss:Pattern="Solid" />
        </Style>
    </Styles>
    <Worksheet ss:Name="Journal">
        <Table ss:DefaultColumnWidth="90">
            {$rowsXml}
        </Table>
    </Worksheet>
</Workbook>
XML;

        return $xml;
    }

    protected function excelRow(array $cells, $styleId = null)
    {
        $styleAttribute = $styleId ? ' ss:StyleID="' . $styleId . '"' : '';
        $cellsXml = array_map(function ($cell) {
            $type = $cell['type'];
            $value = $this->escapeForXml($cell['value']);

            if ($type === 'Number' && $value === '') {
                $type = 'String';
            }

            return '<Cell><Data ss:Type="' . $type . '">' . $value . '</Data></Cell>';
        }, $cells);

        return '<Row' . $styleAttribute . '>' . implode('', $cellsXml) . '</Row>';
    }

    protected function escapeForXml($value)
    {
        if ($value === null) {
            return '';
        }

        return htmlspecialchars((string) $value, ENT_QUOTES | ENT_XML1, 'UTF-8');
    }
}
