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
            $begin_date = $this->bigin_date;
            $end_date = $this->end_date;
            $mouvements = Mouvements::with('dossier')
            ->whereDate('created_at', '>=', $begin_date)->get();
       

        return view('livewire.rapport.rapport', compact('mouvements','idcount'));
    }


    public function filter(){
      

    }
}
