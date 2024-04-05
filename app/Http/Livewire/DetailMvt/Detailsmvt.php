<?php

namespace App\Http\Livewire\DetailMvt;

use Livewire\Component;
use App\Models\Mouvements as Mouvements;
use App\Models\Dossiers as Dossiers;
use App\Models\Caisses as Caisse;
use App\Models\CorbeilleMouvement as CorbeilleMouvement;
use App\Models\OtherDetailsMouvement;
use Illuminate\Support\Facades\DB;


class Detailsmvt extends Component
{
    public $id_dossier, $idcount = 0, $creat = false, $list = true, $op_print = false;
    public $id_mouvement_tr, $motif_tr, $montant_tr, $observation_tr, $type_tr, $beneficiaire_tr, $id_dossier_tr, $listCaisse, $Opdevise;
    public $type, $motif, $observation, $beneficiaire, $montant, $transfer = false, $transfer_id;
    protected $listeners = [
        'closeFolder' => 'closeFolder',
        'deleteMvt' => 'deleteMvt'
    ];

    public function mount($id)
    {
        $this->id_dossier = $id;
    }
    public function showform()
    {
        $this->creat = true;
        $this->list = false;
    }

    protected $rules = [
        'montant' => 'required',
        'observation' => 'required',
        'beneficiaire' => 'required',
        'motif' => 'required',
        'type' => 'required',
        'Opdevise' => 'required',
        'listCaisse' => 'required'
    ];

    public function resetField()
    {
        $this->montant = '';
        $this->observation = '';
        $this->motif = '';
        $this->beneficiaire = '';
    }

    public function render()
    {
        $type = "entree";
        $dossiers = Dossiers::all();
        $dossier =  Dossiers::find($this->id_dossier);
        $tt_int =   Mouvements::where('type', 'int')->where('dossier_id', $dossier->id)->sum('montant');
        $tt_out =   Mouvements::where('type', 'out')->where('dossier_id', $dossier->id)->sum('montant');
        $mouvements = Mouvements::where('dossier_id', 'like', $dossier->id)->get();
        $caisses = Caisse::all();
        return view('livewire.detailmvt.detailsmvt', compact('dossier', 'mouvements', 'tt_int', 'tt_out', 'dossiers', 'caisses'));
    }
    public function transfert_edit($id)
    {
        $this->id_mouvement_tr = $id;
        $data_tr = Mouvements::find($this->id_mouvement_tr);
        $this->montant_tr = $data_tr->montant;
        $this->type_tr = $data_tr->type;
        $this->beneficiaire_tr = $data_tr->beneficiaire;
        $this->motif_tr = $data_tr->motif;
        $this->observation_tr = $data_tr->observation;
        $this->transfer = true;
        $this->list = false;
    }
    public function update_tranfert()
    {
        try {
            Mouvements::find($this->id_mouvement_tr)->fill(
                [
                    'dossier_id' => $this->id_dossier_tr,
                    'montant' => $this->montant_tr,
                    'motif' => $this->motif_tr,
                    'beneficiaire' => $this->beneficiaire_tr,
                ]
            )->save();

            $this->list = true;
            $this->transfer = false;
            session()->flash('message', 'Trasfert reussi');
        } catch (\Exception $e) {
            dd($e);
        }
    }

    public function store()
    {
        $this->validate();
        DB::beginTransaction();
        try {
            $seacrh = "Dossier";
            $caisse = Caisse::where('name_caisse', 'like', $seacrh)->first();
            //a refactorer la valeur usd et cdf dois etre dans une variable globale
            if ($this->Opdevise == 'usd') {
                $mount_usd = $this->montant;
                $form_mount_cdf = 0;
                $old_mt = $caisse->montant;
                if ($this->type == 'int') {
                    $new_mt = $this->montant + $old_mt;
                }
                if ($this->type == 'out') {
                    $new_mt = $old_mt - $this->montant;
                }
                $caisse->montant = $new_mt;
            } else {
                $mount_usd = 0;
                //variable public recu par le fourmalair
                $form_mount_cdf = $this->montant;
                $old_mt_bdd = $caisse->amount_cdf;
                //operation en entree
                if ($this->type == 'int') {
                    $new_mt = $form_mount_cdf + $old_mt_bdd;
                }
                if ($this->type == 'out') {
                    $new_mt = $old_mt_bdd - $form_mount_cdf;
                }
                $caisse->amount_cdf = $new_mt;
            }

            $caisse->save();
            $mouvement = Mouvements::create(
                [
                    'dossier_id' => $this->id_dossier,
                    'montant' => $mount_usd,
                    'type' => $this->type,
                    'libelle' => 'operation',
                    'motif' => $this->motif,
                    'observation' => $this->observation,
                    'beneficiaire' => $this->beneficiaire,
                    'caisse_id' => $caisse->id
                ]
            );

            OtherDetailsMouvement::create([
                'dossier_id' => $this->id_dossier,
                'amount_cdf' => $form_mount_cdf,
            ]);


            if ($mouvement) {
                $this->op_print = $mouvement->id;
                session()->flash('message', 'Operation reussi');
                    $this->creat = false;
                    $this->list = true;
                    $this->resetField();
                DB::commit();
            }
        } catch (\Exception $e) {
            session()->flash('message', dd($e));
        }
    }

    public function closeFolder($id_dossier)
    {
        Dossiers::find($id_dossier)->fill(
            [
                'status' => false,
            ]
        )->save();
        redirect('shortdetails/close');
    }

    public function deleteMvt($id)
    {
        try {
            $mvt_by_id = Mouvements::find($id);

            if ($mvt_by_id) {
                $userEmail = auth()->user()->email;
                $store = CorbeilleMouvement::create(
                    [
                        'dossier_id' => $mvt_by_id->dossier_id,
                        'montant' => $mvt_by_id->montant,
                        'type' => $mvt_by_id->type,
                        'libelle' => $mvt_by_id->libelle,
                        'motif' => $mvt_by_id->motif,
                        'observation' => $mvt_by_id->observation,
                        'beneficiaire' => $mvt_by_id->beneficiaire,
                        'caisse_id' => $mvt_by_id->caisse_id,
                        'user_id' => $userEmail
                    ]
                );
                if ($store) {
                    $caisse = Caisse::find(1);
                    if ($mvt_by_id->type == 'int') {
                        $caisse->decrement('montant', $mvt_by_id->montant);
                    } else {
                        $caisse->increment('montant', $mvt_by_id->montant);
                    }
                    $caisse->save();
                    $mvt_by_id->delete();
                }
            }
        } catch (\Exception $e) {
            dd($e);
        }
    }
}
