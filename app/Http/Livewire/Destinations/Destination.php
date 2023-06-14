<?php

namespace App\Http\Livewire\Destinations;
use App\Models\Destinations as Destinations;


use Livewire\Component;

class Destination extends Component
{
    public $libelle, $destinations,$id_dest,$updated_dest=false;
    public $resultat;
    public $test;
    public $idcount=1;
    protected $rules =[
        'libelle' => 'required',
        ];

    public function render()
    {   $destinations = Destinations::All();
    
        
        return view('livewire.destinations.destination',['destination'=>$destinations]);
    }

    private function resetField(){
        $this ->libelle = '';
    }

    protected $listeners = [
        'deleteDest' => 'destroy'

    ];

    public function store(){
        $this->validate();
        try {
            Destinations::create(
                [
                    'destination' => $this->libelle] 
                );

            session()->flash('message','Ville cree Avec succee');
            $this ->resetField();

        }
        catch(\Exception $e) {
            session()->flash('message', 'erreur lors de la creation de la ville ');
            $this ->resetField();
        }
    }

    public function cancel(){
        $this->updated_dest = false;
        $this->resetField();
    }

    

    public function edit($id_dest){
         $this-> id_dest=$id_dest;
         $dest = Destinations::findOrFail($id_dest);
         $this->libelle = $dest->destination;
         $this->id_dest = $dest->id;
         $this->updated_dest =true;
        session()->flash('message', 'Update success ');
    }
    public function update(){
        $this->validate();

        try{
            Destinations::find($this->id_dest)->fill([
                'destination' => $this->libelle
            ])->save();
            $this->resetField();
            session()->flash('message', 'Update success');
        }
        catch(\Exception $e){
            session()->flash('message', 'Update error');
            $this->resetField();
        }
    }

    public function destroy($id){
       try{

        Destinations::find($id)->delete();
        session()->flash('message', 'Suppression reussi');
       }
       catch(\Exception $e){
        session()->flash('message', 'Suppression reussi');

       }

        

    }
}
