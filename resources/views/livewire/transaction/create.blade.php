<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">Gestion des Transactions</h3>
    </div>
    <div class="card-body bg-light">
        @if (session()->has('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        @if (session()->has('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @endif

        <!-- Formulaire -->
        <form wire:submit.prevent="processTransaction">
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="from_account">Depuis le compte (Source)</label>
                    <select id="from_account" wire:model.defer="from_account"
                        class="form-control @error('from_account') is-invalid @enderror">
                        <option value="">Sélectionnez un compte</option>
                        @foreach ($accounts as $account)
                            <option value="{{ $account->id }}">
                                {{ $account->name_caisse }} - USD : {{ number_format($account->amount_usd, 2) }} - CDF :
                                {{ number_format($account->amount_cdf, 0, ',', ' ') }}
                            </option>
                        @endforeach
                    </select>
                    @error('from_account')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="to_account">Vers le compte (Destination)</label>
                    <select id="to_account" wire:model.defer="to_account"
                        class="form-control @error('to_account') is-invalid @enderror">
                        <option value="">Sélectionnez un compte</option>
                        @foreach ($accounts as $account)
                            <option value="{{ $account->id }}">
                                {{ $account->name_caisse }} - USD : {{ number_format($account->amount_usd, 2) }} - CDF :
                                {{ number_format($account->amount_cdf, 0, ',', ' ') }}
                            </option>
                        @endforeach
                    </select>
                    @error('to_account')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Montants -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="amount_usd">Montant en USD</label>
                    <input type="number" step="0.01" wire:model.defer="amount_usd"
                        class="form-control @error('amount_usd') is-invalid @enderror">
                    @error('amount_usd')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="amount_cdf">Montant en CDF</label>
                    <input type="number" wire:model.defer="amount_cdf"
                        class="form-control @error('amount_cdf') is-invalid @enderror">
                    @error('amount_cdf')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Détails -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="transaction_type">Type de Transaction</label>
                    <select id="transaction_type" wire:model.defer="transaction_type"
                        class="form-control @error('transaction_type') is-invalid @enderror">
                        <option value="transfer">Transfert</option>
                        <option value="deposit">Dépôt</option>
                        <option value="withdrawal">Retrait</option>
                    </select>
                    @error('transaction_type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
                <div class="col-md-6">
                    <label for="transaction_date">Date</label>
                    <input type="date" wire:model.defer="transaction_date"
                        class="form-control @error('transaction_date') is-invalid @enderror">
                    @error('transaction_date')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Description -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <label for="description">Description</label>
                    <textarea wire:model.defer="description"
                        class="form-control @error('description') is-invalid @enderror"></textarea>
                    @error('description')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Bouton de soumission -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-success">Valider la Transaction</button>
                </div>
            </div>
        </form>
    </div>
</div>
