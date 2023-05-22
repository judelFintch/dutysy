<?php

namespace App\Http\Livewire\Clients;
use App\Models\Clients as Clients;


use Livewire\Component;

class Client extends Component
{
    public $updateclient = false;
    public $name_cl, $type_cl,$tel_cl,$email_cl,$rccm_cl,$idnat_cl,$adresse_cl;
    public $idcount;
    
    public $clients;

    

    public function render()
    {
        $this->clients = Clients::select('id','name','type','tel','email','rccm','idnatat','adresse')->get();
        return view('livewire.clients.client');
    }


   
}
