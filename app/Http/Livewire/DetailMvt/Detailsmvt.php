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
        $dossier = Dossiers::find($this->id_dossier);
        
        // Ensure $dossier is not null before proceeding
        if ($dossier) {
            $tt_int = Mouvements::where('type', 'int')->where('dossier_id', $dossier->id)->sum('montant');
            $tt_out = Mouvements::where('type', 'out')->where('dossier_id', $dossier->id)->sum('montant');
            $mouvements = Mouvements::with('otherDetails')->where('dossier_id', $dossier->id)->get();
        } else {
            // Handle the case when $dossier is null
            // Maybe set $tt_int, $tt_out, and $mouvements to default values or handle the error
            $tt_int = 0;
            $tt_out = 0;
            $mouvements = collect(); // An empty collection for consistency
        }

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
            $search = "Dossier";
            $caisse = Caisse::where('name_caisse', 'like', "%{$search}%")->firstOrFail();
    
            // Supposons que les taux soient stockés dans un fichier de configuration / variables d'environnement
            // Par exemple: config('app.currency_rates.usd_to_cdf')
            $amount_usd = $this->Opdevise == 'usd' ? $this->montant : 0;
            $amount_cdf = $this->Opdevise == 'cdf' ? $this->montant : 0;
            $this->updateCaisseAmount($caisse, $amount_usd, $amount_cdf);
            $mouvement = Mouvements::create([
                'dossier_id' => $this->id_dossier,
                'montant' => $amount_usd, // Assurez-vous que cela est correct, sinon ajustez en fonction de la logique métier.
                'type' => $this->type,
                'libelle' => 'operation',
                'motif' => $this->motif,
                'observation' => $this->observation,
                'beneficiaire' => $this->beneficiaire,
                'caisse_id' => $caisse->id
            ]);
    
            OtherDetailsMouvement::create([
                'dossier_id' => $this->id_dossier,
                'amount_cdf' => $amount_cdf,
            ]);
    
            if ($mouvement) {
                $this->op_print = $mouvement->id;
                session()->flash('message', __('Operation réussie.'));
                DB::commit();
            }
        } catch (\Exception $e) {
            DB::rollBack();
            //Log::error($e);
            session()->flash('message', __('Une erreur est survenue lors de l\'opération.'));
        }
    }


    private function updateCaisseAmount($caisse, $amount_usd, $amount_cdf) {
        if ($this->Opdevise == 'usd') {
            $old_amount = $caisse->montant;
            $new_amount = $this->type == 'int' ? $old_amount + $amount_usd : $old_amount - $amount_usd;
            $caisse->montant = $new_amount;
        } else {
            $old_amount_cdf = $caisse->amount_cdf;
            $new_amount_cdf = $this->type == 'int' ? $old_amount_cdf + $amount_cdf : $old_amount_cdf - $amount_cdf;
            $caisse->amount_cdf = $new_amount_cdf;
        }
    
        $caisse->save();
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
