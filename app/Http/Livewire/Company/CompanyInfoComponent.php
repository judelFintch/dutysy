<?php

namespace App\Http\Livewire\Company;

use Livewire\Component;
use App\Models\CompanyInfo;

class CompanyInfoComponent extends Component
{


    public function render()
    {
        $company = CompanyInfo::first();
        return view('livewire.company.company-info-component', compact('company'));
    }
}
