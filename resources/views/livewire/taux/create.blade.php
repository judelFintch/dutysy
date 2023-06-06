<div id="form-client">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <input class="form-control" type="number" placeholder="Tapez le nouveau taux"
                    class="@error('taux') is-invalid @enderror" type="text" wire:model.defer="taux">
                @error('taux') <span> {{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <button wire:click.prenvent="store" class="btn btn-primary">Valider</button>
        </div>
    </div>
</div>