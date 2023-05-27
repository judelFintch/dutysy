<div>
    <x-app-layout>
        <div class="page-wrapper">
            @include('partials.nav_left')
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">Caisse - {{$caisse->name_caisse}} </h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Solde $ {{ number_format($caisse->montant)}} </li>
                            </ul>
                        </div>
                        <div class="col-auto float-end ms-auto">
                            <a href="#" wire:click="showform()" class="btn add-btn" data-bs-toggle="modal"
                                data-bs-target="#add_salary"><i class="fa fa-plus"></i>Entree</a>
                        </div>
                    </div>
                </div>

                @include('livewire.detailscaisse.creat')

            </div>
        </div>
    </x-app-layout>
    <div>