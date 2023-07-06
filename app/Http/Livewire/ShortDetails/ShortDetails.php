<?php

namespace App\Http\Livewire\ShortDetails;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use App\Models\Dossiers;
class ShortDetails extends Component
{
    public $op, $today,$archives = false;
    public function mount($op){
        $this->op = $op;
        $this->today = date('Y-m-d');
    }
    public function render()
    {   
        if($this->op === 'negatif'){
            $dossiers = DB::table(function ($query) {
                $query->select('mouvements.dossier_id')
                    ->selectRaw('SUM(CASE WHEN mouvements.type = "int" THEN mouvements.montant ELSE -mouvements.montant END) AS solde')
                    ->from('mouvements')
                    ->join('dossiers', 'mouvements.dossier_id', '=', 'dossiers.id')
                    ->where('dossiers.status', '=', 1)
                    ->groupBy('mouvements.dossier_id');
            }, 'sub')
            ->where('solde', '<', 0)
            ->distinct()
            ->get();
                $id_dossier =$dossiers->pluck('dossier_id');
                $dossiers = Dossiers::find($id_dossier);
        } else if($this->op === 'byday'){
            $dossiers = Dossiers ::whereDate('created_at',$this->today)->get();
        }
        else{
            $dossiers = Dossiers ::where('status',0)->get();
        }
        $idcount =1;
        $archive = $this->archives =true;
        return view('livewire.short-details.short-details',compact('idcount','dossiers','archive'));
    }
}
