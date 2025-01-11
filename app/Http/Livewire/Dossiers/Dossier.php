<?php

namespace App\Http\Livewire\Dossiers;

use App\Models\{
    Clients,
    Dossiers,
    Destinations,
    Mouvements,
    Caisses
};
use Illuminate\Support\Facades\DB;
use Illuminate\Session\SessionManager;
use Livewire\Component;

class Dossier extends Component
{
    public $client, $destination, $creat = false, $type_marchandise, $chauffeur, $plaque, $provenance;
    public $montant_init = 0, $montant_cdf = 0, $devise = 'usd';
    public $selected_id, $update_dossier = false, $idcount = 0, $list = true;
    public $bigin_date, $end_date, $query, $search, $date;

    protected $rules = [
        'client' => 'required',
        'destination' => 'required',
        'type_marchandise' => 'required',
        'chauffeur' => 'required',
        'plaque' => 'required',
        'provenance' => 'required',
        'date' => 'required',
        'montant_init' => 'required'
    ];

    public function showForm()
    {
        $this->creat = true;
        $this->list = false;
    }

    public function mount(SessionManager $sessionManager)
    {
        $this->bigin_date = date('Y-m-d');
        $this->end_date = date('Y-m-d');
    }

    public function updatedQuery()
    {
        $this->search = $this->query !== '' ? $this->query : false;
    }

    public function render()
    {
        $search = '%' . $this->search . '%';
        $clients = Clients::all();
        $destinations = Destinations::all();
        $dossier_day = Dossiers::whereDate('created_at', $this->bigin_date)->count();
        $dossiers = Dossiers::orderBy('id', 'DESC')->where('status', 1);

        if ($this->search) {
            $dossiers->where('plaque', 'like', $search);
        }

        $dossiers = $dossiers->get();

        $negatif = DB::table(function ($query) {
            $query->select('mouvements.dossier_id')
                ->selectRaw('SUM(CASE WHEN mouvements.type = "int" THEN mouvements.amount_usd ELSE -mouvements.amount_usd END) AS solde')
                ->from('mouvements')
                ->join('dossiers', 'mouvements.dossier_id', '=', 'dossiers.id')
                ->where('dossiers.status', '=', 1)
                ->groupBy('mouvements.dossier_id');
        }, 'sub')
            ->where('solde', '<', 0)
            ->distinct()
            ->count('dossier_id');

        $dossiers_close = Dossiers::where('status', 0)->count();
        $outstanding_count = Dossiers::where('status', 1)->count();

        $montantTotal = DB::table('mouvements')
            ->join('dossiers', 'mouvements.dossier_id', '=', 'dossiers.id')
            ->where('dossiers.status', '=', 1)
            ->selectRaw('SUM(CASE WHEN mouvements.type = "int" THEN mouvements.amount_usd ELSE -mouvements.amount_usd END) AS somme_solde')
            ->value('somme_solde');

        $montantTotalclose = DB::table('mouvements')
            ->join('dossiers', 'mouvements.dossier_id', '=', 'dossiers.id')
            ->where('dossiers.status', '=', 0)
            ->selectRaw('SUM(CASE WHEN mouvements.type = "int" THEN mouvements.amount_usd ELSE -mouvements.amount_usd END) AS somme_solde')
            ->value('somme_solde');

        define('compte_bureau', 'COMPTE BUREAU');

        $cpb = Dossiers::where('plaque', compte_bureau)->first();
        $solde_caisse = Caisses::where('id', 1)->first();

        return view('livewire.dossiers.dossier', compact(
            'dossiers',
            'destinations',
            'clients',
            'dossier_day',
            'dossiers_close',
            'negatif',
            'outstanding_count',
            'montantTotal',
            'montantTotalclose',
            'cpb',
            'solde_caisse'
        ));
    }

    private function resetInput()
    {
        $this->client = $this->destination = $this->type_marchandise = null;
        $this->chauffeur = $this->plaque = $this->provenance = null;
        $this->montant_init = $this->montant_cdf = 0;
    }

    public function reinit()
    {
        $this->resetInput();
    }

    public function store()
    {
        $this->validate();

        try {
            DB::transaction(function () {
                $dossier = Dossiers::create([
                    'client_id' => $this->client,
                    'destination_id' => $this->destination,
                    'type_marchandise' => $this->type_marchandise,
                    'chauffeur' => $this->chauffeur,
                    'plaque' => $this->plaque,
                    'provenance' => $this->provenance,
                    'amount_usd' => $this->montant_init,
                    'amount_cdf' => $this->montant_cdf,
                    'date_created' => $this->date,
                    'status' => true
                ]);

                $caisse = Caisses::where('name_caisse', 'like', 'Dossier')->first();

                if ($caisse) {
                    $montant_init = max(0, (float) $this->montant_init);
                    $montant_cdf = max(0, (float) $this->montant_cdf);

                    $caisse->update([
                        'amount_usd' => $caisse->amount_usd + $montant_init,
                        'amount_cdf' => $caisse->amount_cdf + $montant_cdf
                    ]);

                    Mouvements::create([
                        'dossier_id' => $dossier->id,
                        'type' => 'int',
                        'libelle' => $this->plaque,
                        'amount_usd' => $this->montant_init,
                        'amount_cdf' => $this->montant_cdf,
                        'motif' => $this->chauffeur,
                        'beneficiaire' => $this->provenance,
                        'observation' => '---',
                        'date_created' => $this->date,
                        'caisse_id' => $caisse->id
                    ]);
                }
            });

            session()->flash('message', 'Opération réussie');
            $this->creat = false;
            $this->list = true;
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function edit($id)
    {
        $record = Dossiers::findOrFail($id);

        $this->selected_id = $id;
        $this->client = $record->client_id;
        $this->destination = $record->destination_id;
        $this->type_marchandise = $record->type_marchandise;
        $this->chauffeur = $record->chauffeur;
        $this->plaque = $record->plaque;
        $this->provenance = $record->provenance;
        $this->montant_init = $record->montant_init;
        $this->update_dossier = true;
    }

    public function update()
    {
        $validatedData = $this->validate();

        $record = Dossiers::findOrFail($this->selected_id);
        $record->update($validatedData);

        $record->caisse->update(["amount" => $validatedData["montant_init"]]);

        $this->update_dossier = false;
        $this->resetInput();
    }

    public function destroy($id)
    {
        if ($id) {
            $record = Dossiers::where('id', $id)->first();
            if ($record) {
                $record->caisse->delete();
                $record->delete();
            }
        }
    }
}
