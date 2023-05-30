<?php

namespace App\Http\Livewire\Printdetail;
use App\Models\Mouvements as Mouvements;
use App\Models\Dossiers as Dossiers;
use App\Models\Clients  as Clients;

use Livewire\Component;



class Printdetail extends Component
{
    public $dossier_id;

    public function mount($id){
        $this->dossier_id = $id;
    }
    public function render()
    {
        $mouvements = Mouvements::where('dossier_id',  $this->dossier_id)->get(); 
        $dossier = Dossiers::where('id',  $this->dossier_id)->first(); 
        $id_client =$dossier->client_id;
        $client = Clients::where('id', $id_client)->first(); 
        return view('livewire.printdetail.printdetail', compact('mouvements','dossier','client'));
    }
}
