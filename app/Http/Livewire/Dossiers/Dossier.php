<?php

namespace App\Http\Livewire\Dossiers;

use Livewire\Component;
use App\Models\Dossiers;

class Dossier extends Component
{
    public $client_id, $destination_id, $type_marchandise, $chauffeur, $plaque, $provenance, $montant_init;
    public $selected_id, $search;

    protected $updatesQueryString = ['search'];

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
        return view('livewire.dossiers.dossier', compact('dossiers'));
    }

    private function resetInput(){
        $this->client_id = null;
        $this->destination_id = null;
        $this->type_marchandise = null;
        $this->chauffeur = null;
        $this->plaque = null;
        $this->provenance = null;
        $this->montant_init = null;
    }

    public function store()
    {
        $validatedData = $this->validate([
            'client_id' => 'required',
            'destination_id' => 'required',
            'type_marchandise' => 'required',
            'chauffeur' => 'required',
            'plaque' => 'required',
            'provenance' => 'required',
            'montant_init' => 'required'
        ]);
        Dossiers::create($validatedData);
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
        $record->update($validatedData);
        $this->resetInput();
    }

    public function destroy($id){
        if($id){
            $record = Dossiers::where('id', $id);
            $record->delete();
        }
    }

    public function mount(){
        $this->search = request()->query('search', $this->search);
    }
}
