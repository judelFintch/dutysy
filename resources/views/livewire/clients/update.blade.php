
<div class="form-update" id="form-update">
<div class="card">
    <label>Modification </label>
    <input type="hidden" wire:model="cl_id">

        <input placeholder="Tapez le nom d" class="@error('name_cl') is-invalid @enderror" type="text" wire:model="name_cl">
            @error('name_cl') <span> {{ $message }}</span> @enderror

        <input placeholder="Tapez le nom type client" class="@error('type_cl') is-invalid @enderror" type="text" wire:model="type_cl">
        @error('type_cl') <span> {{ $message }}</span> @enderror

        <input placeholder="Tapez le nom type tel" class="@error('tel_cl') is-invalid @enderror" type="text" wire:model="tel_cl">
        @error('tel_cl') <span> {{ $message }}</span> @enderror

        <input placeholder="Tapez email" class="@error('email_cl') is-invalid @enderror" type="text" wire:model="email_cl">
        @error('email_cl') <span> {{ $message }}</span> @enderror

        <input placeholder="Tapez le nom rccm" class="@error('rccm_cl') is-invalid @enderror" type="text" wire:model="rccm_cl">
        @error('rccm_cl') <span> {{ $message }}</span> @enderror

        <input placeholder="Tapez l'adresse" class="@error('adresse_cl') is-invalid @enderror" type="text" wire:model="adresse_cl">
        @error('adresse_cl') <span> {{ $message }}</span> @enderror
        
        <input placeholder="Tapez idnat" class="@error('idnat_cl') is-invalid @enderror" type="text" wire:model="idnat_cl">
        @error('idnat_cl') <span> {{ $message }}</span> @enderror
   
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button" wire:click.prevent="update()">Valider</button>

    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button" wire:click="cancel()">Annuler</button>
</div>
</div>