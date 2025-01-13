<?php

namespace App\Http\Livewire\Banque;

use Livewire\Component;
use App\Models\Caisses;

class Banque extends Component
{


    public $isCreating;
    public $detailsCaisse;
    public $list = true;


    public function showForm()
    {
        $this->isCreating = true;
        $this->list = false;
    }

    public function mount()
    {
        $this->detailsCaisse = Caisses::all();
    }
    public function render()
    {
        return view('livewire.banque.banque');
    }
}
