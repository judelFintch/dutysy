<div>
    <!-- Barre de navigation -->
    <x-nav_left />

    <div class="page-wrapper">
        <!-- Contenu principal -->
        <div class="content container-fluid">
            <!-- En-tête avec logo -->
            <div class="page-header mb-4">
                <div class="d-flex align-items-center justify-content-between">
                    <!-- Logo -->
                    <div class="logo">
                        <img src="{{ asset('images/logo.png') }}" alt="Company Logo" style="height: 60px;">
                    </div>
                    <!-- Titre principal -->
                    <h1 class="page-title text-primary mb-0">Rapport des Transactions</h1>
                </div>
                <hr class="my-3">
            </div>

            <!-- Section des filtres et tableau -->
            <div class="card shadow-sm border-0">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Filtres de Rapport</h3>
                </div>
                <div class="card-body bg-light">
                    <div class="row mb-4">
                        <!-- Date de début -->
                        <div class="col-md-4">
                            <label for="startDate" class="form-label">Date de début</label>
                            <input type="date" id="startDate" wire:model.defer="startDate" class="form-control">
                            @error('startDate')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Date de fin -->
                        <div class="col-md-4">
                            <label for="endDate" class="form-label">Date de fin</label>
                            <input type="date" id="endDate" wire:model.defer="endDate" class="form-control">
                            @error('endDate')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <!-- Bouton Filtrer -->
                        <div class="col-md-4 d-flex align-items-end">
                            <button class="btn btn-primary w-100" wire:click="loadTransactions">Filtrer</button>
                        </div>
                    </div>

                    <!-- Tableau des transactions -->
                    <table class="table table-bordered table-striped">
                        <thead class="bg-secondary text-white">
                            <tr>
                                <th>#</th>
                                <th>Source</th>
                                <th>Destination</th>
                                <th>Montant</th>
                                <th>Devise</th>
                                <th>Type</th>
                                <th>Statut</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($transactions as $index => $transaction)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $transaction->fromAccount->name_caisse ?? 'N/A' }}</td>
                                    <td>{{ $transaction->toAccount->name_caisse ?? 'N/A' }}</td>
                                    <td>{{ number_format($transaction->amount, 2) }}</td>
                                    <td>{{ $transaction->currency }}</td>
                                    <td>{{ ucfirst($transaction->transaction_type) }}</td>
                                    <td>{{ ucfirst($transaction->status) }}</td>
                                    <td>{{ $transaction->processed_at }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="8" class="text-center">Aucune transaction trouvée.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <!-- Bouton Télécharger le PDF -->
                    <div class="text-center mt-4">
                        <button class="btn btn-success" wire:click="generatePDF">Télécharger le PDF</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
