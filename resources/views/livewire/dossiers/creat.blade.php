<form wire:submit.prevent="{{ $update_dossier ? 'update' : 'store' }}" method="POST"
    class="bg-light shadow-lg rounded p-4 border">
    @csrf <!-- CSRF Protection -->

    <h4 class="text-primary mb-4">Gestion des Dossiers</h4>

    <!-- Checkbox Simple ou Par Lot -->
    <div class="row mb-4">
        <div class="col-md-12 d-flex align-items-center">
            <div class="form-check me-4">
                <input class="form-check-input" type="radio" name="mode" id="simple" value="simple"
                    wire:model.live="mode">
                <label class="form-check-label" for="simple">
                    Simple
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="mode" id="par_lot" value="par_lot"
                    wire:model.live="mode">
                <label class="form-check-label" for="par_lot">
                    Par Lot
                </label>
            </div>
        </div>
    </div>

    @if ($formReference)
        <div class="row mb-3">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="plaque" class="form-label">Refence du LOT</label>
                    <textarea type="text" id="refenceLot" name="plaque" wire:model.defer="referenceInput" placeholder
                        placeholder="Tapez la référence" class="form-control"></textarea>
                    @error('plaque')
                        <span class="text-danger small">{{ $message }}</span>
                    @enderror
                </div>
            </div>
        </div>
    @endif

    <!-- Première rangée : Référence et Type -->
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-group">
                <label for="plaque" class="form-label">Référence</label>
                <input type="text" id="plaque" name="plaque" wire:model.defer="plaque"
                    placeholder="Tapez la référence" class="form-control">
                @error('plaque')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="type_marchandise" class="form-label">Type</label>
                <input type="text" id="type_marchandise" name="type_marchandise" wire:model.defer="type_marchandise"
                    placeholder="Entrez le type" class="form-control text-secondary">
                @error('type_marchandise')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <!-- Deuxième rangée : Client et Destination -->
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-group">
                <label for="clients" class="form-label">Client</label>
                <select name="client" id="clients" wire:model.defer="client" class="form-control">
                    <option value="">Sélectionnez un client</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
                @error('client')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label for="destination" class="form-label">Lieu</label>
                <select name="destination" id="destination" wire:model.defer="destination" class="form-control">
                    <option value="">Sélectionnez</option>
                    @foreach ($destinations as $destination)
                        <option value="{{ $destination->id }}">{{ $destination->destination }}</option>
                    @endforeach
                </select>
                @error('destination')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <!-- Troisième rangée : Déposant et Provenance -->
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-group">
                <label for="chauffeur" class="form-label">Déposant</label>
                <input type="text" id="chauffeur" name="chauffeur" wire:model.defer="chauffeur"
                    placeholder="Déposant" class="form-control">
                @error('chauffeur')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="provenance" class="form-label">Provenance</label>
                <input type="text" id="provenance" name="provenance" wire:model.defer="provenance"
                    placeholder="Entrez la provenance" class="form-control">
                @error('provenance')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Montants en USD et CDF -->
        <div class="col-md-6">
            <div class="form-group">
                <label for="montant_init" class="form-label">Montant en USD</label>
                <input type="number" id="montant_init" name="montant_init" value="0"
                    wire:model.defer="montant_init" placeholder="Entrez le montant en USD" class="form-control">
                @error('montant_init')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
            <div class="form-group">
                <label for="montant_cdf" class="form-label">Montant en CDF</label>
                <input type="number" id="montant_cdf" value="0" name="montant_cdf"
                    wire:model.live="montant_cdf" placeholder="Entrez le montant en CDF" class="form-control">
                @error('montant_cdf')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <!-- Date -->
    <div class="row mb-3">
        <div class="col-md-6">
            <div class="form-group">
                <label for="date" class="form-label">Date</label>
                <input id="date" type="date" class="form-control @error('date') is-invalid @enderror"
                    placeholder="Sélectionnez une date" wire:model.defer="date"
                    value="{{ old('date', now()->toDateString()) }}">
                @error('date')
                    <span class="text-danger small">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <!-- Bouton de soumission -->
    <div class="form-group text-center mt-4">
        <button type="submit" class="btn btn-success px-4 py-2">
            {{ $update_dossier ? 'Modifier' : 'Enregistrer' }}
        </button>
    </div>
</form>
