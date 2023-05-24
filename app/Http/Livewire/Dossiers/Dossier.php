<?php

namespace App\Http\Livewire\Dossiers;

use Livewire\Component;
use App\Models\Dossiers;
use App\Models\Clients;
use App\Models\Destinations;
use App\Models\Caisses;

class Dossier extends Component
{
    public $client, $destination, $type_marchandise, $chauffeur, $plaque, $provenance, $montant_init;
    public $selected_id, $search;
    public $update_dossier = false;

    protected $updatesQueryString = ['search'];
    protected $rules = [
        'client' => 'required',
        'destination' => 'required',
        'type_marchandise' => 'required',
        'chauffeur' => 'required',
        'plaque' => 'required',
        'provenance' => 'required',
        'montant_init' => 'required'
    ];

    public function render()
    {
        $search = '%'.$this->search.'%';
        $dossiers = Dossiers::where('client_id', 'like', $search)
            ->orWhere('destination_id', 'like', $search)
            ->orWhere('type_marchandise', 'like', $search)
            ->orWhere('chauffeur', 'like', $search)
            ->orWhere('plaque', 'like', $search)
            ->orWhere('provenance', 'like', $search)
            ->orWhere('montant_init', 'like', $search)
            ->paginate(5);
            $clients = Clients::all();
            $destinations = Destinations::all();
            $dossiers = Dossiers::all();
        return view('livewire.dossiers.dossier', compact('dossiers', 'destinations', 'clients', 'dossiers'));
    }

    private function resetInput(){
        $this->client = null;
        $this->destination = null;
        $this->type_marchandise = null;
        $this->chauffeur = null;
        $this->plaque = null;
        $this->provenance = null;
        $this->montant_init = null;
    }
    public function reinit(){
        $this->resetInput();
    }


    public function store()
    {
        //$validatedData =
        $this->validate();
     $dossier =    Dossiers::create([
            'client_id' => $this->client,
            'destination_id' => $this->destination,
            'type_marchandise' => $this->type_marchandise,
            'chauffeur' => $this->chauffeur,
            'plaque' => $this->plaque,
            'provenance' => $this->provenance,
            'montant_init' => $this->montant_init
        ]);
        Caisses::create([
            "amount"=>$this->montant_init,
            "entree"=>1,
            "reference_id"=>$dossier->id
        ]);
        $this->resetInput();
    }

    public function edit($id)
    {
        $record = Dossiers::findOrFail($id);
        $this->selected_id = $id;
        $this->client_id = $record->client_id;
        $this->destination_id = $record->destination_id;
        $this->type_marchandise = $record->type_marchandise;
        $this->chauffeur = $record->chauffeur;
        $this->plaque = $record->plaque;
        $this->provenance = $record->provenance;
        $this->montant_init = $record->montant_init;
        $this->update_dossier = true;
    }

    public function update(){
        $validatedData = $this->validate([
            'client_id' => 'required',
            'destination_id' => 'required',
            'type_marchandise' => 'required',
            'chauffeur' => 'required',
            'plaque' => 'required',
            'provenance' => 'required',
            'montant_init' => 'required'
        ]);
        $record = Dossiers::find($this->selected_id);
        // $record->caisse->amount = $validatedData["montant_init"];
        $record->caisse->update(["amount"=> $validatedData["montant_init"]]);
        $record->update($validatedData);
        $this->update_dossier = false;
        // $record->caisses
        $this->resetInput();
    }

    public function destroy($id){
        if($id){
            $record = Dossiers::where('id', $id)->first();
            $record->caisse->delete();
            $record->delete();
        }
    }

    public function mount(){
        $this->search = request()->query('search', $this->search);
    }
}
