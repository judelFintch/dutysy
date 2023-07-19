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

    
    public function render()
    {
        $compile = DB::table('mouvements')
    ->join('dossiers', 'mouvements.dossier_id', '=', 'dossiers.id')
    ->where('dossiers.status', '=', 1)
    ->select('dossiers.plaque')
    ->selectRaw('SUM(CASE WHEN mouvements.type = "int" THEN mouvements.montant ELSE -mouvements.montant END) AS solde')
    ->groupBy('dossiers.id', 'dossiers.plaque')
    ->get();

    $montantTotal = DB::table('mouvements')
    ->join('dossiers', 'mouvements.dossier_id', '=', 'dossiers.id')
    ->where('dossiers.status', '=', 1)
   
    ->selectRaw('SUM(CASE WHEN mouvements.type = "int" THEN mouvements.montant ELSE -mouvements.montant END) AS somme_solde')
    ->value('somme_solde');

// Passer les résultats à la vue

        return view('livewire.compilation.compilation', compact('compile','montantTotal'));
    }
}
