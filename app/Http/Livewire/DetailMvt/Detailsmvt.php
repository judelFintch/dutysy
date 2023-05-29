<?php

namespace App\Http\Livewire\DetailMvt;

use Livewire\Component;
use App\Models\Mouvements as Mouvements;
use App\Models\Dossiers as Dossiers;
use App\Models\Caisses as Caisse;

class Detailsmvt extends Component
{


    public $id_dossier,$idcount=0, $creat=false,$list=true;
    public $type,$motif,$observation,$beneficiaire,$montant;

    public function mount($id){
        $this->id_dossier = $id;

    }

    public function showform(){
        $this->creat=true;
        $this->list=false;
    }

    protected $rules = [
        'montant' =>'required',
        'observation' =>'required',
        'beneficiaire' =>'required',
        'motif' =>'required',
        'type' =>'required',
    ];

    public function resetField(){
        $this->montant = '';
        $this->observation = '';
        $this->motif = '';
        $this->beneficiaire = '';

    }
    public function render()
    {
        $type ="entree";
        $dossier = Dossiers::find($this->id_dossier);
        $tt_int = Mouvements::where('type', 'Entree')->where('dossier_id', $dossier->id)->sum('montant');
        $tt_out = Mouvements::where('type', 'Sortie')->where('dossier_id', $dossier->id)->sum('montant');
        $mouvements = Mouvements::
        where('dossier_id', 'like',$dossier->id)->get();
        return view('livewire.detailmvt.detailsmvt', compact('dossier','mouvements','tt_int','tt_out'));
    }


    public function store(){
        $this->validate();
        try{
            $seacrh ="Dossier";
            $caisse = Caisse::where('name_caisse', 'like', $seacrh)->first();
            Mouvements::create(
                [
                    'dossier_id' =>$this->id_dossier,
                    'montant' =>$this->montant,
                    'type' => $this->type,
                    'libelle' =>'operation',
                    'motif'=>$this->motif,
                    'observation'=>$this->observation,
                    'beneficiaire' =>$this->beneficiaire,
                    'caisse_id' => $caisse->id
                ]
            );

            session()->flash('message','Operation reussi');
            $this->creat =false;
            $this->list =true;
            $this->resetField();

        }
        catch(\Exception $e) {

            session()->flash('message',dd($e));
        }

    }
}
