<?php

namespace App\Http\Livewire\Rapport;
use App\Models\Mouvements as Mouvements;
use App\Models\Dossiers as Dossier;

use Livewire\Component;

class Rapport extends Component
{
    public $bigin_date, $end_date, $type_op;
    public $listeners =['setDate'];


    public function setDate($data){
       
        $this->bigin_date = $data;

    }
    public function mount (){
        //default date day
        $this->bigin_date = date('Y-m-d');
        $this->end_date = date('Y-m-d');
    }

    public function render()
        {   $idcount =0;
            $bigin_date = $this->bigin_date;
            $end_date = $this->end_date;
        $mouvements = Mouvements::whereDate('created_at', '>=', $bigin_date)
        ->whereDate('created_at', '<=', $end_date)
        ->get();

        return view('livewire.rapport.rapport', compact('mouvements','idcount'));
    }


    public function filter(){
      

    }
}
