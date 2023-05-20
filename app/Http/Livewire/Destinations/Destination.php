<?php

namespace App\Http\Livewire\Destinations;
use App\Models\Destinations as Destinations;


use Livewire\Component;

class Destination extends Component
{
    public $libelle, $destinations;
    public $resultat;

   protected $rules =[
    'libelle' => 'required',

    ];

    
    public function render()
    {   $this->destinations = Destinations::select('destination')->get();
        return view('livewire.destinations.destination');
    }

    public function store(){
        $this->validate();
        try {
            Destinations::create(
                [
                    'destination' => $this->libelle] 
                );

            session()->flash('success','Insertion reussi pour la ville de destination');

        }
        catch(\Exception $e) {
            session()->flash('error', 'errur lors de la creation de la ville ');
            
            //$this ->resetField();

        }
       
        
    }
}
