<?php

namespace App\Http\Livewire\Company;

use Livewire\Component;
use App\Models\CompanyInfo;

class CompanyStoreComponent extends Component
{
    public $name;
    public $address;
    public $phone;
    public $email_primary;
    public $email_secondary;
    public $website;
    public $nif;
    public $rccm;
    public $type_of_company;

    public $company;

    public function mount()
    {
        // Charger les informations existantes
        $this->company = CompanyInfo::first();

        if ($this->company) {
            $this->name = $this->company->name;
            $this->address = $this->company->address;
            $this->phone = $this->company->phone;
            $this->email_primary = $this->company->email_primary;
            $this->email_secondary = $this->company->email_secondary;
            $this->website = $this->company->website;
            $this->nif = $this->company->nif;
            $this->rccm = $this->company->rccm;
            $this->type_of_company = $this->company->type_of_company;
        }
    }

    public function save()
    {
        $this->validate([
             'name' => 'required|string|max:255',
             'address' => 'required|string|max:255',
             'phone' => 'required|string|max:20',
             'email_primary' => 'required|email|max:255',
             'email_secondary' => 'nullable|email|max:255',
             'website' => 'nullable|url|max:255',
             'nif' => 'required|string',
             'rccm' => 'required|string|max:50',
             'type_of_company' => 'required|string|max:255',
         ]);

        if ($this->company) {
            $this->company->update([
                'name' => $this->name,
                'address' => $this->address,
                'phone' => $this->phone,
                'email_primary' => $this->email_primary,
                'email_secondary' => $this->email_secondary,
                'website' => $this->website,
                'nif' => $this->nif,
                'rccm' => $this->rccm,
                'type_of_company' => $this->type_of_company,
            ]);
        } else {
            CompanyInfo::create([
                'name' => $this->name,
                'address' => $this->address,
                'phone' => $this->phone,
                'email_primary' => $this->email_primary,
                'email_secondary' => $this->email_secondary,
                'website' => $this->website,
                'nif' => $this->nif,
                'rccm' => $this->rccm,
                'type_of_company' => $this->type_of_company,
            ]);
        }

        session()->flash('message', 'Informations de l’entreprise mises à jour avec succès.');
    }
    public function render()
    {
        return view('livewire.company.company-store-component');
    }
}
