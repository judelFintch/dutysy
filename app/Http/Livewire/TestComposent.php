<?php

namespace App\Http\Livewire;

use Livewire\Component;

class TestComposent extends Component
{

    public $seach = false;
    public function render()
    {
        $seachs = $this->seach;
        session()->put('key', $seachs);
        return view('livewire.test-composent',compact('seachs'));
    }
}
