
<div class="card">
    <label>Creation ville</label>
    <input class="" placeholder="Tapez le nom de la ville" class="@error('libelle') is-invalid @enderror form-control" type="text" wire:model="libelle">
        @error('libelle') <span> {{ $message }}</span> @enderror
    <button class="btn btn-prinmary" type="button" wire:click.prevent="store()">Valider</button>
</div>