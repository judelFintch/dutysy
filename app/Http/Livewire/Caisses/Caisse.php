<?php

namespace App\Http\Livewire\Caisses;
use App\Models\Caisses as Caisses;

use Livewire\Component;

class Caisse extends Component
{
    public $creat=false;
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
            }


    public function store(){
        $this->validate();
        $this->creat=false;

        try{

            Caisses::create([
                'name_caisse' => $this->caisse_name,
                'montant' => $this->init_montant,
                'type_caisse' => $this->type_caisse
            ]);
            session()->flash('message', 'Creation reussi');

        }

        catch(\Exception $e){
            dd($e);
            session()->flash('message', 'Creation echouee');
        }

    }

}
