<?php

namespace App\Http\Livewire\Rapport;
use App\Models\Mouvements as Mouvements;

use Livewire\Component;

class Rapport extends Component
{
    public $bigin_date, $end_date;
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
}
