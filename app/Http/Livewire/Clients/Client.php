<?php

namespace App\Http\Livewire\Clients;
use App\Models\Clients as Clients;


use Livewire\Component;

class Client extends Component
{
    public $updateclient = false;
    public $name,$type,$tel,$email,$rccm,$idnat,$adresse;
    public $idcount;
    
    public $clients;

    

    public function render()
    {
        $this->clients = Clients::select('id','name','type','tel','email','rccm','idnatat','adresse')->get();
        return view('livewire.clients.client');
    }
}
