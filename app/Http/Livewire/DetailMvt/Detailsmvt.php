<?php

namespace App\Http\Livewire\DetailMvt;

use Livewire\Component;
use App\Models\Mouvements as Mouvements;
use App\Models\Dossiers as Dossiers;
use App\Models\Caisses as Caisse;

class Detailsmvt extends Component
{
    public $id_dossier ,$idcount=0, $creat=false,$list=true, $op_print=false;
    public $id_mouvement_tr,$motif_tr,$montant_tr,$observation_tr,$type_tr,$beneficiaire_tr,$id_dossier_tr;
    public $type,$motif,$observation,$beneficiaire,$montant,$transfer=false,$transfer_id;
    protected $listeners = [
        'closeFolder' => 'closeFolder'
    ];

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
        $dossiers = Dossiers::all();
        $dossier =  Dossiers::find($this->id_dossier);
        $tt_int =   Mouvements::where('type', 'int')->where('dossier_id', $dossier->id)->sum('montant');
        $tt_out =   Mouvements::where('type', 'out')->where('dossier_id', $dossier->id)->sum('montant');
        $mouvements = Mouvements::where('dossier_id', 'like',$dossier->id)->get();
        return view('livewire.detailmvt.detailsmvt', compact('dossier','mouvements','tt_int','tt_out','dossiers'));
    }

    public function transfert_edit($id){
        $this->id_mouvement_tr=$id;
        $data_tr=Mouvements::find($this->id_mouvement_tr);
        $this->montant_tr=$data_tr->montant;
        $this->type_tr=$data_tr->type;
        $this->beneficiaire_tr=$data_tr->beneficiaire;
        $this->motif_tr=$data_tr->motif;
        $this->observation_tr=$data_tr->observation;
        $this->transfer=true;
        $this->list=false;
    }
    public function update_tranfert(){
        try{
            Mouvements::find($this->id_mouvement_tr)->fill(
                [
                    'dossier_id' => $this->id_dossier_tr,
                    'montant' => $this->montant_tr,
                    'motif' => $this->motif_tr,
                    'beneficiaire' => $this->beneficiaire_tr,
                    ]
            )->save();

            $this->list=true;
            $this->transfer=false;
            session()->flash('message', 'Trasfert reussi');
        }
        catch(\Exception $e){
            dd($e);
        }
    }

    public function store(){
        $this->validate();
        try{
            $seacrh ="Dossier";
            $caisse = Caisse::where('name_caisse', 'like', $seacrh)->first();
           $mouvement =Mouvements::create(
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

            if($mouvement){
                    $old_mt = $caisse->montant;
                    if($this->type =='int'){
                        $new_mt = $this->montant+$old_mt;
                    }
                    if($this->type == 'out'){
                        $new_mt = $old_mt-$this->montant;
                    }
                    $caisse->montant =$new_mt;
                    $caisse->save();
                    $this->op_print = $mouvement->id;

                session()->flash('message','Operation reussi');
                   $this->creat =false;
                   $this->list =true;
                   $this->resetField();
                }
        }
        catch(\Exception $e) {
            session()->flash('message',dd($e));
        }

    }

    public function closeFolder($id_dossier){
        Dossiers ::find($id_dossier)->fill(
            [
                'status' => false,
            ]
        )->save();
    }
}