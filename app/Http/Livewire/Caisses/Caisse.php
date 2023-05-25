<?php

namespace App\Http\Livewire\Caisses;
use App\Models\Caisses as Caisses;

use Livewire\Component;

class Caisse extends Component
{
    public $creat=true;
    public $caisse_name,$init_montant,$type_caisse;
    public function render()
    {
        return view('livewire.caisses.caisse');
    }

    protected $rules =[
        'caisse_name' => 'required',
        'init_montant' => 'required',
        'type_caisse' => 'required'
    ];
    public function showform(){
        $this->creat=false;

        try{

            Caisses::creat([
                ''

            ]);

        }

        catch(\Exception $e){

        }
    }


    public function store(){
        $this->validate();
    }

}
