<form wire:submit.prevent="{{ $update_dossier ? 'update' : 'store' }}" method="POST" class="bg-white shadow rounded px-3 pt-2 pb-2">
    @csrf <!-- Protection CSRF -->
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <input placeholder="Entrez la plaque" type="text" id="plaque" name="plaque" wire:model.defer="plaque" class="form-control">
                @error('plaque') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <input type="text" wire:model.defer="type_marchandise" name="type_marchandise" placeholder="Type" class="form-control text-secondary">
            @error('type_marchandise') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <select name="client" id="clients" wire:model.defer="client" class="form-control">
                    <option value="">Selectionner client</option>
                    @foreach ($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
                @error('client') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <select name="destination" wire:model.defer="destination" id="destination" class="form-control">
                <option value="">Dechargement</option>
                @foreach ($destinations as $destination)
                    <option value="{{ $destination->id }}">{{ $destination->destination }}</option>
                @endforeach
            </select>
            @error('destination') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <input type="text" placeholder="Chauffeur" id="chauffeur" wire:model.defer="chauffeur" name="chauffeur" class="form-control">
                @error('chauffeur') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <input type="text" id="provenance" name="provenance" wire:model.defer="provenance" placeholder="Provenance" class="form-control">
                @error('provenance') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <label for="montant_init">Montant</label>
            <input type="number" id="montant_init" name="montant_init" wire:model.defer="montant_init" class="form-control">
            @error('montant_init') <span class="error">{{ $message }}</span> @enderror
        </div>
    </div>

    <div class="form-group pt-3 d-flex justify-content-center align-items-center">
        <button type="submit" class="btn btn-primary">{{ $update_dossier ? 'Modifier' : 'Enregistrer' }}</button>
    </div>
</form>
