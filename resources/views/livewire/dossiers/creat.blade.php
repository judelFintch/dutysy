<form wire:submit.prevent="{{ $update_dossier ? 'update' : 'store' }}" method="POST" class="bg-white shadow rounded px-3 pt-2 pb-2">
    @csrf <!-- CSRF Protection -->
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="plaque">Reference</label>
                <input type="text" id="plaque" name="plaque" wire:model.defer="plaque" placeholder="Tapez la reference" class="form-control">
                @error('plaque') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="type_marchandise">Type</label>
                <input type="text" id="type_marchandise" name="type_marchandise" wire:model.defer="type_marchandise" placeholder="Enter type" class="form-control text-secondary">
                @error('type_marchandise') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="clients">Client</label>
                <select name="client" id="clients" wire:model.defer="client" class="form-control">
                    <option value="">Select client</option>
                    @foreach ($clients as $client)
                    <option value="{{ $client->id }}">{{ $client->name }}</option>
                    @endforeach
                </select>
                @error('client') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                <label for="destination">Lieu</label>
                <select name="destination" id="destination" wire:model.defer="destination" class="form-control">
                    <option value="">Select</option>
                    @foreach ($destinations as $destination)
                    <option value="{{ $destination->id }}">{{ $destination->destination }}</option>
                    @endforeach
                </select>
                @error('destination') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <label for="chauffeur">Deposant :</label>
                <input type="text" id="chauffeur" name="chauffeur" wire:model.defer="chauffeur" placeholder="Deposant" class="form-control">
                @error('chauffeur') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="provenance">Provenance</label>
                <input type="text" id="provenance" name="provenance" wire:model.defer="provenance" placeholder="Enter provenance" class="form-control">
                @error('provenance') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
        
        <div class="col-sm-6">
            <div class="form-group">
                <label for="montant_init">Montant en USD</label>
                <input type="number" id="montant_init" name="montant_init" value="0" wire:model.defer="montant_init" placeholder="Enter amount in USD" class="form-control">
                @error('montant_init') <span class="error">{{ $message }}</span> @enderror
            </div>
            <div class="form-group">
                <label for="montant_init">Montant en CDF</label>
                <input type="number" id="montant_cdf" value="0" name="montant_cdf" wire:model.live="montant_cdf" placeholder="Enter amount in CDF" class="form-control">
                @error('montant_cdf') <span class="error">{{ $message }}</span> @enderror
            </div>
        </div>
    </div>

    <div class="form-group pt-3 d-flex justify-content-center align-items-center">
        <button type="submit" class="btn btn-primary">{{ $update_dossier ? 'Modifier' : 'Enregistrer' }}</button>
    </div>
</form>


