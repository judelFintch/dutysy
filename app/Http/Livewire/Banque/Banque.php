<?php

namespace App\Http\Livewire\Banque;

use Livewire\Component;
use App\Models\Caisses;
use App\Models\Caisse;
use App\Models\TransactionMoney;
use Illuminate\Support\Facades\DB;

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
        $accounts = Caisses::all();
        return view('livewire.banque.banque', compact('accounts', ));
    }
}
