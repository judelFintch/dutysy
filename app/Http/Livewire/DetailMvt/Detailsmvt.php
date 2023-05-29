<?php

namespace App\Http\Livewire\DetailMvt;

use Livewire\Component;
use App\Models\Mouvements as Mouvements;
use App\Models\Dossiers as Dossiers;

class Detailsmvt extends Component
{

    public $id_dossier;


    public function mount($id){
        $this->id_dossier = $id;
    }
    public function render()
    {
        $dossier = Dossiers::find($this->id_dossier);
        return view('livewire.detail-mvt.detailsmvt', compact('dossier'));
    }
}
