<?php

namespace App\Http\Livewire\Compilation;

use Livewire\Component;
use App\Models\Mouvements;
use Illuminate\Support\Facades\DB;
use App\Models\Dossiers;
use App\Models\Clients;
use App\Models\Destinations;
use App\Models\Caisses;

class Compilation extends Component
{

    public $devise ='usd';
    
    public function render()
    {
        $compile = DB::table('mouvements')
    ->join('dossiers', 'mouvements.dossier_id', '=', 'dossiers.id')
    ->where('dossiers.status', '=', 1)
    ->select('dossiers.plaque')
    ->selectRaw('SUM(CASE WHEN mouvements.type = "int" THEN mouvements.amount_usd ELSE -mouvements.amount_usd END) AS solde')
    ->groupBy('dossiers.id', 'dossiers.plaque')
    ->get();

    $montantTotal = DB::table('mouvements')
    ->join('dossiers', 'mouvements.dossier_id', '=', 'dossiers.id')
    ->where('dossiers.status', '=', 1)
   
    ->selectRaw('SUM(CASE WHEN mouvements.type = "int" THEN mouvements.amount_usd ELSE -mouvements.amount_usd END) AS somme_solde')
    ->value('somme_solde');

// Passer les résultats à la vue
        $solde_caisse= Caisses::where('id', 1)->first();
        return view('livewire.compilation.compilation', compact('compile','solde_caisse'));
    }
}
