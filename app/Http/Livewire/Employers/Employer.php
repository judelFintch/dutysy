<?php

namespace App\Http\Livewire\Employers;
use App\Models\Employeers as Employeers;
use App\Models\fonctionEmployers as Fonctions;

use Livewire\Component;

class Employer extends Component
{
    public $employees,$idcount,$listfonction,$id_employe;
    public $updateemployees=false;
    public $first_name,$second_name,$tel,$email,$sexe,$birth_date,$fonction_id= 1;
    public function render()
    {   
        $this->fonction_id ;
        $this->listfonction = Fonctions::select('id','fonction')->get();
        $this->employees = Employeers::with('fonction')->get();
        return view('livewire.employers.employer');
    }

    public function resetField(){
        $this->first_name ='';
        $this->second_name ='';
        $this->tel ='';
        $this->email ='';
        $this->birth_date ='';

    }

    protected $rules =
    [
        'first_name' => 'required',
        'second_name' => 'required',
        'tel' => 'required',
        'email' => 'required',
        'sexe' => 'required',
        'birth_date' => 'required',

    ];

    public function cancel(){
        $this->resetField();
        $this->updateemployees=false;
    }


    public function store(){
        //$this ->validate();
        try{
            Employeers::create([
                'first_name'=> $this->first_name,
                'second_name'=> $this->second_name,
                'email'=> $this->email,
                'tel'=> $this->tel,
                'birth_date'=> $this->birth_date,
                'sexe'=> $this->sexe,
                'fonction_id'=>$this->fonction_id
            ]);
             session()->flash('message', 'Creation reussi');

        }
        catch(\Exception $e){
            dd( $this->fonction_id);
            session()->flash('message', 'Erreur lors de la creation');
        }

    }


    public function edit($id){
        
        $resu = Employeers::findOrFail($id);
        $this->id_employe=$resu->id;
        $this->first_name= $resu->first_name;
        $this->second_name= $resu->second_name;
        $this->first_name= $resu->second_name;
        $this->tel= $resu->tel;
        $this->email= $resu->email;
        $this->sexe =$resu->sexe;
        $this->birth_date =$resu->birth_date;
        $this->fonction_id =$resu->fonction_id;
        $this->updateemployees=true;
       
    }

    public function update(){
        $this->validate();
        try{

            Employeers::find($this->id_employe)->fill(
                [
                    'first_name' => $this->first_name,
                    'second_name' => $this->second_name,
                    'email' => $this->email,
                    'tel' => $this->tel,
                    'birth_date' => $this->birth_date,
                    ]
            )->save();
            session()->flash('message','mis ajour reussi');
        }
        catch(\Exception $e){
         dd($e);
         session()->flash('message','mis ajour echouee');

        }
    }
    public function delete(){

    }


    
}
