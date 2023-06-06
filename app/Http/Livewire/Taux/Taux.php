<?php

namespace App\Http\Livewire\Taux;
use App\Models\TauxJour as TauxJour;

use Livewire\Component;

class Taux extends Component
{
    public $create,$taux;

    public function mount(){
        $this->create = false;
    }

    public function showform(){
        $this->create = true;
    }

    protected $rules = [
        'taux' => 'required'
    ];

    public function store(){
        $this->validate();
        try {

            TauxJour::create(
                [
                    'taux' => $this->taux]
            );
           session()->flash('message', 'success');

        }
        catch (\Exception $e){
            session()->flash('message', 'error');
        }
    }
    public function render()
    {
        return view('livewire.taux.taux');
    }
}
