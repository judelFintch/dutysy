<?php

namespace App\Http\Livewire\DetailsCaisse;

use Livewire\Component;
use App\Models\Caisses as Caisse;

class Detailscaisse extends Component
{
    public $id_caisse,$montant,$motif,$beneficiaire,$observation,$type;

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
        try {
            session()->flash('message', 'error');

        }
        catch(\Exception $e)
        {
            session()->flash('message', 'error');
        }


    }


    public function edit(){

    }


    public function update(){

    }
}
