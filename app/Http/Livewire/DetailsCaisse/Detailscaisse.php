<?php

namespace App\Http\Livewire\DetailsCaisse;

use Livewire\Component;
use App\Models\Caisses as Caisse;

class Detailscaisse extends Component
{
    public $id_caisse,$montant,$motif,$beneficiaire,$observation;

    public function mount($id)
    {
        $this->id_caisse = $id;
    }


    protected $rules = [
        'observation' =>'required',
        'montant' =>'required',
        'beneficiaire' =>'required',
         'motif' =>'required'

    ];
    public function render()
    {
        $caisse = Caisse ::find($this->id_caisse);
        return view('livewire.detailscaisse.detailscaisse',compact(['caisse']));
    }


    public function store(){
        $this->validate();

    }


    public function edit(){

    }


    public function update(){

    }
}
