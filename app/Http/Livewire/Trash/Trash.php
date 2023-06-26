<?php

namespace App\Http\Livewire\Trash;

use Livewire\Component;
use App\Models\CorbeilleMouvement as CorbeilleMouvement;

class Trash extends Component
{
    public function render()
    {
        $idcount =0 ;
        $mouvements = CorbeilleMouvement::all();
        return view('livewire.trash.trash', compact('idcount','mouvements'));
    }
}
