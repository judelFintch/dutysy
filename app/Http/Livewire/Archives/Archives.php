<?php

namespace App\Http\Livewire\Archives;
use App\Models\Dossiers;

use Livewire\Component;

class Archives extends Component
{
    public $idcount = 0;

    public function archivesFolder()
    {
        Dossiers::where('status', 0)->update(['status' => 3]);
        redirect('/Archives');
    }
    
    public function render()
    {
        $dossiers =  Dossiers::where('status', 3)->get();
        return view('livewire.archives.archives', compact('dossiers'));
    }
}
