<div class="container-fluid">
    <div class="pt-3 pb-3 px-2  ">
   <div class="row">
    <div class="col-lg-4">
        <div class="text-center h3 fw-bold"> Crée un dossier</div>
                <form wire:submit.prevent="{{ $update_dossier ? 'update' : 'store' }}" method="POST" class="bg-white shadow rounded px-3 pt-2 pb-2">
                    <div class="form-group">
                        <label for="montant_init">Plaque</label>
                        <input type="text"  id="plaque" name="plaque" wire:model="plaque"  class="form-control">
                        @error('plaque') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="type_marchandise">Type de marchandise </label>
                        <input type="text" wire:model="type_marchandise"  name="type_marchandise" placeholder="type marchandise" class="form-control text-secondary">
                        @error('type_marchandise') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="clients">Client</label>
                        <select  name="client" id="clients" wire:model="client" class="form-control">
                            <option value="" >selectionner une client</option>
                            @foreach ($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->name }}</option>
                            @endforeach
                        </select>
                        @error('client') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="destination">Destination</label>
                        <select  name="destination" wire:model="destination" id="destination" class="form-control">
                            <option value="" >selectionner une destination</option>
                            @foreach ($destinations as $destination)
                                <option value="{{ $destination->id }}" >{{ $destination->destination }}</option>
                            @endforeach
                        </select>
                        @error('destination') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="chauffeur">Chauffeur</label>
                        <input type="text"  id="chauffeur" wire:model="chauffeur" name="chauffeur"  class="form-control">
                        @error('chauffeur') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="provenance">Provenance</label>
                        <input type="text"  id="provenance" name="provenance"  wire:model="provenance" class="form-control">
                        @error('provenance') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group">
                        <label for="montant_init">Montant initiale</label>
                        <input type="number"  id="montant_init" name="montant_init" wire:model="montant_init" class="form-control">
                        @error('montant_init') <span class="error">{{ $message }}</span> @enderror
                    </div>
                    <div class="form-group pt-3 d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary">{{ $update_dossier ? 'Modifier' : 'Enregistrer' }}</button>
                        <button wire:click.prevent="reinit" class="btn btn-success">Nouveau dossier</button>
                    </div>
                </form>
    </div>
   