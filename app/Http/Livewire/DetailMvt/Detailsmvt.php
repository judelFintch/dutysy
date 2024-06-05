<?php

namespace App\Http\Livewire\DetailMvt;

use Livewire\Component;
use App\Models\Mouvements as Mouvements;
use App\Models\Dossiers as Dossiers;
use App\Models\Caisses as Caisse;
use App\Models\CorbeilleMouvement as CorbeilleMouvement;
use Illuminate\Support\Facades\DB;
use Exception;
use Carbon\Carbon;
class Detailsmvt extends Component

{
    public $timestamps = false;
    public $id_dossier, $idcount = 0, $creat = false, $list = true, $op_print = false;
    public $id_mouvement_tr, $motif_tr, $montant_tr, $observation_tr, $type_tr, $beneficiaire_tr, $id_dossier_tr, $listCaisse;
    public $type, $motif, $observation, $beneficiaire, $amount_cdf,$amount_usd, $transfer = false, $transfer_id,$date;
    public $caisses;
    protected $listeners = [
        'closeFolder' => 'closeFolder',
        'deleteMvt' => 'deleteMvt'
    ];
    public $devise;

    public function mount($id,$devise)
    {
        $this->id_dossier = $id;
        $this->devise = $devise;
        $this->caisses = Caisse::all();
    }
    public function showform()
    {
        $this->creat = true;
        $this->list = false;
    }

    public function changeDevise(){

    }

    protected $rules = [
        'amount_cdf' => 'required',
        'amount_usd' => 'required',
        'observation' => 'required',
        'beneficiaire' => 'required',
        'motif' => 'required',
        'type' => 'required',
        'listCaisse' => 'required',
        'date' => 'required',
    ];

    public function resetField()
    {
        $this->amount_cdf = '';
        $this->amount_usd = '';
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
            $tt_int = Mouvements::where('type', 'int')->where('dossier_id', $dossier->id)->sum('amount_usd');
            $tt_out = Mouvements::where('type', 'out')->where('dossier_id', $dossier->id)->sum('amount_usd');
           
            $tt_int_cdf = Mouvements::where('type', 'int')->where('dossier_id', $dossier->id)->sum('amount_cdf');
            $tt_out_cdf = Mouvements::where('type', 'out')->where('dossier_id', $dossier->id)->sum('amount_cdf');
            
            // Handle the case when $dossier is null
            // Maybe set $tt_int, $tt_out, and $mouvements to default values or handle the error
            ;
            $mouvements = collect(); // An empty collection for consistency
        }

        $mouvements = Mouvements::where('dossier_id', $dossier->id)->get();

        $solde_caisse= Caisse::where('id', 1)->first();
        return view('livewire.detailmvt.detailsmvt', compact('dossier', 'mouvements', 'tt_int', 'tt_out','tt_int_cdf', 'tt_out_cdf','dossiers', 'solde_caisse'));
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
            $amount_usd =  $this->amount_usd;
            $amount_cdf = $this->amount_cdf;

          
            $this->updateCaisseAmount($caisse, $amount_usd, $amount_cdf);
            $mouvement = Mouvements::create([
                'dossier_id' => $this->id_dossier,
                'amount_usd' => $amount_usd, // Assurez-vous que cela est correct, sinon ajustez en fonction de la logique métier.
                'amount_cdf' => $amount_cdf, // Assurez-vous que cela est correct, sinon ajustez en fonction de la logique métier.
                'type' => $this->type,
                'libelle' => 'operation',
                'motif' => $this->motif,
                'observation' => $this->observation,
                'beneficiaire' => $this->beneficiaire,
                'caisse_id' => $caisse->id,
                'date_created' => $this->date,
                'created_at' => $this->date
            ]);
        
                if ($mouvement) {
                    $this->op_print = $mouvement->id;
                    $this->resetField();
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
       // Obtention des montants actuels
        $old_amount_usd = $caisse->amount_usd;
        $new_amount_usd = $this->type == 'int' ? $old_amount_usd + $amount_usd : $old_amount_usd - $amount_usd;

        $old_amount_cdf = $caisse->amount_cdf;
        $new_amount_cdf = $this->type == 'int' ? $old_amount_cdf + $amount_cdf : $old_amount_cdf - $amount_cdf;

        // Vérification pour USD
        if ($this->type != 'int' && $old_amount_usd < $amount_usd) {
            throw new Exception("Le montant disponible en USD est insuffisant pour effectuer cette opération.");
        }

        // Vérification pour CDF
        if ($this->type != 'int' && $old_amount_cdf < $amount_cdf) {
            throw new Exception("Le montant disponible en CDF est insuffisant pour effectuer cette opération.");
        }

        // Mise à jour des montants dans la base
        $caisse->amount_usd = $new_amount_usd;
        $caisse->amount_cdf = $new_amount_cdf;
        $caisse->save();

        
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
                                'amount_usd' => $mvt_by_id->amount_usd,
                                'amount_cdf' => $mvt_by_id->amount_cdf,
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
                            $caisse->decrement('amount_usd', $mvt_by_id->amount_usd);
                            $caisse->decrement('amount_cdf', $mvt_by_id->amount_cdf);
                        } else {
                            $caisse->increment('amount_usd', $mvt_by_id->amount_usd);
                            $caisse->increment('amount_cdf', $mvt_by_id->amount_cdf);
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
