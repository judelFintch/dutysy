<div>
    <x-nav_left />
    <div class="page-wrapper">

        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Caisses</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Dossier</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="#" wire:click="showForm()" class="btn add-btn" data-bs-toggle="modal"
                            data-bs-target="#add_salary"><i class="fa fa-plus"></i> Nouvelle Caisse</a>
                    </div>
                </div>
            </div>
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Informations de l'Entreprise</h3>
                </div>
                <div class="card-body bg-light">
                    @if (session()->has('message'))
                        <div class="alert alert-success">{{ session('message') }}</div>
                    @endif

                    <form wire:submit.prevent="save">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="name" class="form-label">Nom de l'Entreprise</label>
                                <input type="text" id="name" wire:model.defer="name" class="form-control">
                                @error('name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="address" class="form-label">Adresse</label>
                                <input type="text" id="address" wire:model.defer="address" class="form-control">
                                @error('address')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="phone" class="form-label">Téléphone</label>
                                <input type="text" id="phone" wire:model.defer="phone" class="form-control">
                                @error('phone')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="email_primary" class="form-label">Email Principal</label>
                                <input type="email" id="email_primary" wire:model.defer="email_primary"
                                    class="form-control">
                                @error('email_primary')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="email_secondary" class="form-label">Email Secondaire</label>
                                <input type="email" id="email_secondary" wire:model.defer="email_secondary"
                                    class="form-control">
                                @error('email_secondary')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="website" class="form-label">Site Web</label>
                                <input type="url" id="website" wire:model.defer="website" class="form-control">
                                @error('website')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="nif" class="form-label">NIF</label>
                                <input type="text" id="nif" wire:model.defer="nif" class="form-control">
                                @error('nif')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div class="col-md-6">
                                <label for="rccm" class="form-label">RCCM</label>
                                <input type="text" id="rccm" wire:model.defer="rccm" class="form-control">
                                @error('rccm')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="type_of_company" class="form-label">Type de Société</label>
                            <input type="text" id="type_of_company" wire:model.defer="type_of_company"
                                class="form-control">
                            @error('type_of_company')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="text-center">
                            <button type="submit" class="btn btn-primary">Enregistrer</button>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
