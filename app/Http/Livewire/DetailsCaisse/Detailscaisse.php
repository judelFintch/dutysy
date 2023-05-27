<?php

namespace App\Http\Livewire\DetailsCaisse;

use Livewire\Component;
use App\Models\Caisses as Caisse;

class Detailscaisse extends Component
{
    public $id_caisse;

    public function mount($id)
    {
        $this->id_caisse = $id;
    }
    public function render()
    {
        $caisse = Caisse ::find($this->id_caisse);
        return view('livewire.details-caisse.detailscaisse',compact(['caisse']));
    }
}
