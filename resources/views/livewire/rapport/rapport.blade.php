<div>
    <div>
        <!-- Sidebar Navigation Component -->
        <x-nav_left />
        <!-- Page Wrapper -->
        <div class="page-wrapper">
            <!-- Content Container -->
            <div class="content container-fluid">
                <!-- Page Header -->
                <div class="page-header">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <h3 class="page-title">Rapport</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                                <li class="breadcrumb-item active">Dossier</li>
                            </ul>
                        </div>
                        <div class="col-6">
                            <div class="top-nav-search">
                                <form action="search">
                                    <input wire:model.live="searchQuery" class="form-control" type="text" placeholder="Filtrez par depense">   
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- End Page Header -->

                <!-- Filter Row -->
                <form wire:submit.prevent="submit" class="w-100">
                    <div class="row filter-row">
                        <!-- Clients Filter -->
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                            <div class="form-group custom-select">
                                <select wire:model.defer="selectClientId" class="form-control" {{ $includeAllClients ? 'disabled' : '' }}>
                                    <option value="">Sélectionner un client</option>
                                    @foreach($clients as $client)
                                    <option value="{{ $client->id}}">{{ $client->name }}</option>
                                    <!-- Ajoutez les options des clients ici -->
                                    @endforeach
                                </select>
                                @error('selectClientId') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" wire:model="includeAllClients" id="includeAllClients">
                                <label class="form-check-label" for="includeAllClients">Tous les clients</label>
                            </div>
                        </div>

                        <!-- Operation Type Filter -->
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                            <div class="form-group custom-select">
                                <select wire:model.defer="selectOpType" class="form-control" {{ $includeAllOperations ? 'disabled' : '' }}>
                                    <option value="">Tout type</option>
                                    <option value="int">Entree</option>
                                    <option value="out">Sortie</option>
                                </select>
                                @error('selectOpType') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" wire:model="includeAllOperations" id="includeAllOperations">
                                <label class="form-check-label" for="includeAllOperations">Toutes les opérations</label>
                            </div>
                        </div>

                        <!-- Begin Date Filter -->
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                            <input type="date" wire:model.defer="begin_date" class="form-control">
                            @error('begin_date') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- End Date Filter -->
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                            <input type="date" wire:model.defer="end_date" class="form-control">
                            @error('end_date') <span class="text-danger">{{ $message }}</span> @enderror
                        </div>

                        <!-- Search Button -->
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12 mb-2 mb-xl-0">
                            <button type="submit" class="btn btn-success w-100">Filtrer</button>
                        </div>

                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                            <button type="button" class="btn btn-outline-secondary w-100" wire:click="resetFilters">Réinitialiser</button>
                        </div>

                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12 mt-2 mt-xl-0">
                            <button type="button" class="btn btn-info w-100" wire:click="exportJournal">Exporter le journal</button>
                        </div>
                    </div>
                </form>



                <!-- End Filter Row -->
                @include('livewire.rapport.list')
            </div>
            <!-- End Content Container -->
        </div>
        <!-- End Page Wrapper -->
    </div>
</div>
