<?php

namespace App\Http\Livewire\Rapport;
use App\Models\Mouvements as Mouvements;
use App\Models\Dossiers as Dossier;
use Illuminate\Validation\Rule;

use Livewire\Component;

class Rapport extends Component
{
    public $begin_date, $end_date,$selectOpType,$selectClients;
    public $devise ='usd';


    public function mount (){
        //default date day
        $this->begin_date = date('Y-m-d');
        $this->end_date = date('Y-m-d');
    }

    protected function rules()
    {
        return [
            'begin_date' => 'required|date|before_or_equal:end_date',
            'end_date' => 'required|date|after_or_equal:begin_date',
            'selectOpType' => ['nullable', Rule::in(['int', 'out'])],
            'selectClients' => 'nullable|string' // Ajustez cette règle selon vos besoins
        ];
    }

    public function submit()
    {
        $this->validate();
        // Logique de soumission
    }

    public function render()
        {   $idcount =0;
            $begin_date = $this->begin_date;
            $end_date = $this->end_date;
            // Incorporez la fin de la journée pour la date de fin
            $end_of_day = date('Y-m-d 23:59:59', strtotime($end_date));
           
            $query = Mouvements::with('dossier')
            ->whereBetween('created_at', [$begin_date, $end_of_day]);
    
        // Ajouter la condition de type d'opération si elle est définie
            if (!empty($this->selectOpType)) {
                $query->where('type', $this->selectOpType);
            }
    
        // Récupérer les mouvements avec les conditions appliquées
        $mouvements = $query->get();
        return view('livewire.rapport.rapport', compact('mouvements','idcount'));
    }

}
