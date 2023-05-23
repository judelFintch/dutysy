<?php

namespace App\Http\Livewire\Clients;
use App\Models\Clients as Clients;


use Livewire\Component;

class Client extends Component
{
    public $updateclient = false;
    public $cl_id,$name_cl,$type_cl,$tel_cl,$email_cl,$rccm_cl,$idnat_cl,$adresse_cl;
    public $idcount,$test;
    public $clients;
     
    protected $rules =[
        'name_cl' => 'required',
        'type_cl' => 'required',
        'tel_cl' => 'required',
        'email_cl' => 'required',
        'rccm_cl' => 'required',
        'idnat_cl' => 'required',
        'adresse_cl' => 'required'
    ];

    protected $listeners = [
        'deleteCli' => 'destroy'

    ];

    public function resetField(){
        $this->name_cl = '';
        $this->email_cl = '';
        $this->type_cl = '';
        $this->rccm_cl = '';
        $this->tel_cl = '';
        $this->idnat_cl = '';
        $this->adresse_cl = '';
    }
    
    public function render()
    {
        $this->clients = Clients::select('id','name','type','tel','email','rccm','idnatat','adresse')->get();
        return view('livewire.clients.client');
    }

    public function cancel(){
        $this->resetField();
    }

    public function store(){
        $this->validate();
        try {
        
            Clients::create(
                [
                    'name' => $this->name_cl,
                    'type' => $this->type_cl,
                    'tel' => $this->tel_cl,
                    'email' => $this->email_cl,
                    'rccm' => $this->rccm_cl,
                    'idnatat' => $this->idnat_cl,
                    'adresse' => $this->adresse_cl
                ]
            );
            session()->flash('message', 'Creation effectuer');
        }
        catch(\Exception $e){
            dd($e);
            session()->flash('messsage', 'erreur de creation client ');
        }
    }


    public function edit($cl_id){
        $this->cl_id = $cl_id;
        $client = Clients::findOrfail($cl_id);
        $this->name_cl = $client->name;
        $this->type_cl = $client->type;
        $this->tel_cl = $client->tel;
        $this->email_cl = $client->email;
        $this->rccm_cl = $client->rccm;
        $this->idnat_cl = $client->idnatat;
        $this->adresse_cl = $client->adresse;
        $this ->updateclient =true;
    }
    
    public function update(){
        $this->validate();
        try {
            
            Clients::Find($this->cl_id)->fill(
                [
                    'name' => $this->name_cl,
                    'type' => $this->type_cl,
                    'tel' => $this->tel_cl,
                    'email' => $this->email_cl,
                    'rccm' => $this->rccm_cl,
                    'idnatat' => $this->idnat_cl,
                    'adresse' => $this->adresse_cl
                ]
            )->save();
            session()->flash('message', 'Modification reussi');

        }
        catch (\Exception $e) {
            session()->flash('message', 'Modification echouee');

        }
    }

    public function destroy($id){
        try{
 
         Clients::find($id)->delete();
         session()->flash('message', 'Suppression reussi');
        }
        catch(\Exception $e){
         session()->flash('message', 'Suppression reussi');
 
        }
 
         
 
     }
}
