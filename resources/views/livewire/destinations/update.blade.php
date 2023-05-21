
<div class="card">
    <label>Mis a jour</label>
    <input type="hidden" wire:model="id_dest">
    <input placeholder="Tapez le nom de la ville" class="@error('libelle') is-invalid @enderror" type="text" wire:model="libelle">
        @error('libelle') <span> {{ $message }}</span> @enderror
   
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button" wire:click.prevent="update()">Valider</button>

    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button" wire:click.prevent="cancel()">Annuler</button>
</div>