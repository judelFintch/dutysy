<?php

namespace App\Http\Livewire\Caisses;

use App\Models\Caisses;
use Livewire\Component;
use App\Enums\TypeCaisse;

class Caisse extends Component
{
    public $isCreating = false;
    public $caisseName, $amountUsd, $amountCdf, $typeCaisse, $detailsCaisse;

    protected $rules = [
        'caisseName' => 'required|string|max:60|unique:caisses,name_caisse',
        'amountUsd' => 'required|numeric|min:0',
        'amountCdf' => 'required|numeric|min:0',
        'typeCaisse' => 'required|string|max:60|unique:caisses,type_caisse',
    ];

    public function render()
    {
        $this->detailsCaisse = Caisses::all();
        return view('livewire.caisses.caisse', [
            'typeCaisseOptions' => TypeCaisse::values(),
        ]);
    }

    public function showForm()
    {
        $this->isCreating = true;
    }
    public function store()
    {
        $this->validate();

        try {
            Caisses::create([
                'name_caisse' => $this->caisseName,
                'amount_usd' => $this->amountUsd,
                'amount_cdf' => $this->amountCdf,
                'type_caisse' => $this->typeCaisse,
            ]);

            session()->flash('success', 'Création réussie');
        } catch (\Exception $e) {
            session()->flash('error', 'Création échouée : ' . $e->getMessage());
        }



        // $this->resetForm();
    }

    private function resetForm()
    {
        $this->isCreating = false;
        $this->caisseName = '';
        $this->amountUsd = '';
        $this->amountCdf = '';
        $this->typeCaisse = '';
    }
}
