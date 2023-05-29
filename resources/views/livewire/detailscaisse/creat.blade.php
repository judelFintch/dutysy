<div id="form-client">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <input type="number" class="form-control" type="text" placeholder="Saisisez le montant"
                    class="@error('montant') is-invalid @enderror" type="text" wire:model="montant">
                @error('montant') <span> {{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <select wire:model="type" class="form-control @error('motif') is-invalid @enderror">
                <option value="">Operation</option>
                <option>Entree</option>
                <option>Sortie</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">

                <input class="form-control" placeholder="beneficiaire" class="@error('beneficiaire') is-invalid @enderror"
                    type="text" wire:model="beneficiaire">
                @error('beneficiaire') <span> {{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <input class="form-control" placeholder="Motif" class="@error('motif') is-invalid @enderror" type="text"
                wire:model="motif">
            @error('motif') <span> {{ $message }}</span> @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <input class="form-control" placeholder="Observation" class="@error('observation') is-invalid @enderror"
                    type="text" wire:model="observation">
                @error('observation') <span> {{ $message }}</span> @enderror
            </div>
        </div>
        <div class="submit-section">
            <button type="button" wire:click.prevent="store()" class="btn btn-primary">Save</button>
        </div>
    </div>
</div>