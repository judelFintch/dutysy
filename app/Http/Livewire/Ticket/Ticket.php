<?php

namespace App\Http\Livewire\Ticket;

use Livewire\Component;
use App\Models\Mouvements as Mouvements;

class Ticket extends Component
{
    public $id_ticket;


    public function mount($id){

        $this->id_ticket = $id;

    }
    public function render()
    {
        $dossier = Mouvements::find($this->id_ticket);
       
        return view('livewire.ticket.ticket', compact('dossier'));
    }
}
