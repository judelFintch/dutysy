<?php

namespace App\Http\Livewire\Dossiers;

use App\Models\Mouvements;
use Livewire\Component;
use App\Models\Dossiers;
use App\Models\Clients;
use App\Models\Destinations;
use App\Models\Caisses;

class Dossier extends Component
{
public $client, $destination,$creat=false,$type_marchandise, $chauffeur, $plaque, $provenance, $montant_init;
public $selected_id, $search;
public $update_dossier = false,$idcount=0,$list=true;

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

public function showform(){
    $this->creat =true;
    $this->list =false;
}

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

try{
$dossier =  Dossiers::create([
        'client_id' => $this->client,
        'destination_id' => $this->destination,
        'type_marchandise' => $this->type_marchandise,
        'chauffeur' => $this->chauffeur,
        'plaque' => $this->plaque,
        'provenance' => $this->provenance,
        'montant_init' => $this->montant_init
    ]);

    

    //a mettre dans une fonction  update
    $search ='Dossier';
    $caisse = Caisses::where('name_caisse', 'like', $search )->first();
    if ($caisse){
        $old_mt=$caisse->montant;
        $nw_mt = $old_mt +$this->montant_init;
        $caisse->montant = $nw_mt;
        $caisse->save();
        }

        Mouvements::create(
        [
            'dossier_id' => $dossier->id,
            'type' => 'int',
            'libelle' => 'Ouverture Dossier',
            'montant' => $this->montant_init,
            'motif' => 'Ouverture Dossier',
            'beneficiaire' => 'Caisse Dossier',
            'observation' => '---',
            'caisse_id' => $caisse->id
        ]
        ); 

        session()->flash('message', 'operation reussi');
        $this->resetInput();
        $this->creat=false;
        $this->creat=true;
    
}
catch(\Exception $e) {
    dd($e);
}
    
    
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