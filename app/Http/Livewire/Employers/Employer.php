<?php

namespace App\Http\Livewire\Employers;
use App\Models\Employeers as Employeers;
use App\Models\fonctionEmployers as Fonctions;

use Livewire\Component;

class Employer extends Component
{
    public $employees,$idcount;
    public $updateemployees=false;
    public function render()
    {
        $this->employees = Employeers::with('fonction')->get();
        return view('livewire.employers.employer');
    }
    public function resetField(){

    }

    protected $rules =
    [


    ];


    public function strore(){

    }


    public function edit($id){

    }

    public function update(){

    }

    public function delete(){

    }


    
}
