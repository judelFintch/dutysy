<div class="card shadow-sm border-0">
    <div class="card-header bg-primary text-white">
        <h3 class="mb-0">Formulaire de Gestion des Caisses</h3>
    </div>
    <div class="card-body bg-light">
        <div id="form-client">
            <!-- Sélection de la caisse -->
            <div class="row mb-4">
                <div class="col-md-12">
                    <div class="form-group">
                        <label for="listCaisse" class="form-label">Entree vers </label>
                        <select id="listCaisse" wire:model.defer="listCaisse"
                            class="form-control @error('motif') is-invalid @enderror">
                            <option value="">Choisissez une caisse</option>
                            @foreach ($caisses as $caisse)
                                <option value="{{ $caisse->id }}">
                                    {{ $caisse->name_caisse }} - USD : {{ $caisse->amount_usd }} - CDF:
                                    {{ $caisse->amount_cdf }}
                                </option>
                            @endforeach
                        </select>
                        @error('listCaisse')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Saisir les montants -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="amount_usd" class="form-label">Montant en USD</label>
                    <div class="form-group">
                        <input id="amount_usd" type="number" value="0"
                            class="form-control @error('montant_usd') is-invalid @enderror"
                            placeholder="Saisissez le montant en USD" wire:model.defer="amount_usd">
                        @error('montant_usd')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="amount_cdf" class="form-label">Montant en CDF</label>
                    <div class="form-group">
                        <input id="amount_cdf" type="number" value="0"
                            class="form-control @error('montant') is-invalid @enderror"
                            placeholder="Saisissez le montant en CDF" wire:model.defer="amount_cdf">
                        @error('amount_cdf')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Opération -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="type" class="form-label">Type d'Opération</label>
                    <select id="type" wire:model.defer="type"
                        class="form-control @error('motif') is-invalid @enderror">
                        <option value="">Sélectionnez une opération</option>
                        <option value="int">Entrée</option>
                        <option value="out">Sortie</option>
                    </select>
                    @error('type')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-6">
                    <label for="date" class="form-label">Date</label>
                    <div class="form-group">
                        <input id="date" type="date" class="form-control @error('date') is-invalid @enderror"
                            wire:model.defer="date" value="{{ old('date', now()->toDateString()) }}">
                        @error('date')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>

            <!-- Informations supplémentaires -->
            <div class="row mb-4">
                <div class="col-md-6">
                    <label for="beneficiaire" class="form-label">Bénéficiaire</label>
                    <div class="form-group">
                        <input id="beneficiaire" type="text"
                            class="form-control @error('beneficiaire') is-invalid @enderror"
                            placeholder="Nom du bénéficiaire" wire:model.defer="beneficiaire">
                        @error('beneficiaire')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>

                <div class="col-md-6">
                    <label for="motif" class="form-label">Motif</label>
                    <input id="motif" type="text" class="form-control @error('motif') is-invalid @enderror"
                        placeholder="Motif de l'opération" wire:model.defer="motif">
                    @error('motif')
                        <span class="text-danger">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            <!-- Bouton de soumission -->
            <div class="row">
                <div class="col-md-12 text-center">
                    <button type="button" wire:click.prevent="store()"
                        class="btn btn-success btn-lg px-5">Valider</button>
                </div>
            </div>
        </div>
    </div>
</div>
