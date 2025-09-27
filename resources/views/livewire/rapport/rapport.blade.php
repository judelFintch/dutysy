<div class="rapport-compact">
    <style>
        .rapport-compact .page-title {
            font-size: 20px;
            letter-spacing: 0.05em;
            text-transform: uppercase;
        }

        .rapport-compact .card,
        .rapport-compact .table,
        .rapport-compact .form-control,
        .rapport-compact .input-group-text,
        .rapport-compact label,
        .rapport-compact .badge,
        .rapport-compact button {
            font-size: 0.9rem;
        }

        .rapport-compact .card-title {
            font-size: 1rem;
        }

        .rapport-compact .table caption,
        .rapport-compact .table th,
        .rapport-compact .table td {
            font-size: 0.88rem;
        }

        .rapport-compact .card-body p,
        .rapport-compact .card-body li {
            font-size: 0.9rem;
        }
    </style>
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
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <h5 class="card-title mb-0"><i class="la la-filter mr-2"></i>Filtres</h5>
                            <span class="badge badge-light" title="Nombre de mouvements affichés">{{ $mouvements->count() }} mouvements</span>
                        </div>

                        <form wire:submit.prevent="submit" class="w-100">
                            <div class="row">
                                <!-- Clients Filter -->
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <label class="text-muted text-uppercase small d-block mb-1">Client</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="la la-user"></i></span>
                                        <select wire:model.defer="selectClientId" class="form-control" {{ $includeAllClients ? 'disabled' : '' }}>
                                            <option value="">Sélectionner un client</option>
                                            @foreach($clients as $client)
                                            <option value="{{ $client->id}}">{{ $client->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    @error('selectClientId') <span class="text-danger small">{{ $message }}</span> @enderror
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" wire:model="includeAllClients" id="includeAllClients">
                                        <label class="form-check-label" for="includeAllClients">Tous les clients</label>
                                    </div>
                                </div>

                                <!-- Operation Type Filter -->
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <label class="text-muted text-uppercase small d-block mb-1">Type d'opération</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="la la-random"></i></span>
                                        <select wire:model.defer="selectOpType" class="form-control" {{ $includeAllOperations ? 'disabled' : '' }}>
                                            <option value="">Tout type</option>
                                            <option value="int">Entrée</option>
                                            <option value="out">Sortie</option>
                                        </select>
                                    </div>
                                    @error('selectOpType') <span class="text-danger small">{{ $message }}</span> @enderror
                                    <div class="form-check mt-2">
                                        <input class="form-check-input" type="checkbox" wire:model="includeAllOperations" id="includeAllOperations">
                                        <label class="form-check-label" for="includeAllOperations">Toutes les opérations</label>
                                    </div>
                                </div>

                                <!-- Begin Date Filter -->
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <label for="begin_date" class="text-muted text-uppercase small d-block mb-1">Date de début</label>
                                    <input id="begin_date" type="date" wire:model.defer="begin_date" class="form-control">
                                    @error('begin_date') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>

                                <!-- End Date Filter -->
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3 mb-3">
                                    <label for="end_date" class="text-muted text-uppercase small d-block mb-1">Date de fin</label>
                                    <input id="end_date" type="date" wire:model.defer="end_date" class="form-control">
                                    @error('end_date') <span class="text-danger small">{{ $message }}</span> @enderror
                                </div>

                                <div class="col-12 col-lg-8 col-xl-6 mb-3">
                                    <label for="searchQuery" class="text-muted text-uppercase small d-block mb-1">Recherche avancée</label>
                                    <div class="input-group">
                                        <span class="input-group-text"><i class="la la-search"></i></span>
                                        <input id="searchQuery" wire:model.defer="searchQuery" class="form-control" type="text" placeholder="Filtrer par motif ou bénéficiaire">
                                    </div>
                                </div>

                                <div class="col-12 col-lg-4 col-xl-6 d-flex flex-wrap align-items-end">
                                    <button type="submit" class="btn btn-success flex-grow-1 flex-lg-grow-0 mr-lg-2 mb-2" style="min-width: 140px;">
                                        <i class="la la-check mr-1"></i>Filtrer
                                    </button>
                                    <button type="button" class="btn btn-outline-secondary flex-grow-1 flex-lg-grow-0 mr-lg-2 mb-2" style="min-width: 140px;" wire:click="resetFilters">
                                        <i class="la la-refresh mr-1"></i>Réinitialiser
                                    </button>
                                    <button type="button" class="btn btn-info flex-grow-1 flex-lg-grow-0 mb-2" style="min-width: 160px;" wire:click="exportJournal">
                                        <i class="la la-file-excel-o mr-1"></i>Exporter en Excel
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- End Filter Row -->
                @if(($summary['count'] ?? 0) > 0)
                <div class="row mb-4">
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 shadow-sm" style="border-left: 4px solid #28a745;">
                            <div class="card-body">
                                <h6 class="text-muted text-uppercase small">Flux USD</h6>
                                <p class="mb-1"><strong>{{ number_format($summary['usd']['entries'], 2) }} $</strong> encaissés</p>
                                <p class="mb-1"><strong>{{ number_format($summary['usd']['exits'], 2) }} $</strong> sortis</p>
                                <p class="mb-0 text-{{ ($summary['usd']['net']) >= 0 ? 'success' : 'warning' }}">
                                    Solde : {{ number_format($summary['usd']['net'], 2) }} $
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 shadow-sm" style="border-left: 4px solid #17a2b8;">
                            <div class="card-body">
                                <h6 class="text-muted text-uppercase small">Flux CDF</h6>
                                <p class="mb-1"><strong>{{ number_format($summary['cdf']['entries'], 2) }} FC</strong> encaissés</p>
                                <p class="mb-1"><strong>{{ number_format($summary['cdf']['exits'], 2) }} FC</strong> sortis</p>
                                <p class="mb-0 text-{{ ($summary['cdf']['net']) >= 0 ? 'success' : 'warning' }}">
                                    Solde : {{ number_format($summary['cdf']['net'], 2) }} FC
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card h-100 shadow-sm" style="border-left: 4px solid #007bff;">
                            <div class="card-body">
                                <h6 class="text-muted text-uppercase small">Résumé rapide</h6>
                                <p class="mb-1">{{ $summary['entries_count'] }} entrée(s)</p>
                                <p class="mb-1">{{ $summary['exits_count'] }} sortie(s)</p>
                                <p class="mb-0">Total mouvements : {{ $summary['count'] }}</p>
                            </div>
                        </div>
                    </div>
                </div>
                @endif

                @if(!empty($insights))
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h6 class="text-muted text-uppercase small mb-3"><i class="la la-lightbulb-o mr-2"></i>Lecture du journal</h6>
                        <ul class="mb-0 pl-3">
                            @foreach($insights as $insight)
                            <li class="mb-1">{{ $insight }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endif

                @include('livewire.rapport.list')
            </div>
            <!-- End Content Container -->
        </div>
        <!-- End Page Wrapper -->
    </div>
</div>
