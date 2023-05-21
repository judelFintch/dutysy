

<div class="card">
    <label>Creation client</label>
    <input placeholder="Tapez le nom d" class="@error('name') is-invalid @enderror" type="text" wire:model="name">
        @error('name') <span> {{ $message }}</span> @enderror

    <input placeholder="Tapez le nom type client" class="@error('type') is-invalid @enderror" type="text" wire:model="type">
    @error('type') <span> {{ $message }}</span> @enderror

    <input placeholder="Tapez le nom type tel" class="@error('tel') is-invalid @enderror" type="text" wire:model="tel">
    @error('tel') <span> {{ $message }}</span> @enderror

    <input placeholder="Tapez le nom rccm" class="@error('rccm') is-invalid @enderror" type="text" wire:model="rccm">
    @error('rccm') <span> {{ $message }}</span> @enderror

    <input placeholder="Tapez l'adresse" class="@error('adresse') is-invalid @enderror" type="text" wire:model="adresse">
    @error('adresse') <span> {{ $message }}</span> @enderror

    
   
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button" wire:click.prevent="store()">Valider</button>
</div>