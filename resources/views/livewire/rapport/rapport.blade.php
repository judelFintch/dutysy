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
                                <select wire:model.defer="selectClientId" class="form-control">
                                    <option value="">Clients</option>
                                    @foreach($clients as $client)
                                    <option value="{{ $client->id}}">{{ $client->name }}</option>
                                    <!-- Ajoutez les options des clients ici -->
                                    @endforeach
                                </select>
                                @error('selectClients') <span class="text-danger">{{ $message }}</span> @enderror
                            </div>
                        </div>

                        <!-- Operation Type Filter -->
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                            <div class="form-group custom-select">
                                <select wire:model.defer="selectOpType" class="form-control">
                                    <option value="">Tout type</option>
                                    <option value="int">Entree</option>
                                    <option value="out">Sortie</option>
                                </select>
                                @error('selectOpType') <span class="text-danger">{{ $message }}</span> @enderror
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
                        <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                            <button type="submit" class="btn btn-success w-100">Search</button>
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