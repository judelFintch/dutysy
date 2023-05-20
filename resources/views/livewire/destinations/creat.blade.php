
   

<div class="card">
    <input placeholder="Tapez la destination" class="@error('libelle') is-invalid @enderror" type="text" wire:model="libelle">
        @error('libelle') <spanc class=" text-red-700 px-4 py-3 rounded relative" role="alert""> {{ $message }}</span> @enderror
   
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded" type="button" wire:click.prevent="store()">Valider</button>
   
</div>