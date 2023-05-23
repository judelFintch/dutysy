


<div class="card">
    <label>Creation update client</label>
    <input  type="hidden" wire:model="id_employe">
        <input placeholder="Nom Employer" class="@error('firs_name') is-invalid @enderror" type="text" wire:model="first_name">
            @error('first_name') <span> {{ $message }}</span> @enderror
        <input placeholder="Tapez le post nom" class="@error('second_name') is-invalid @enderror" type="text" wire:model="second_name">
        @error('type_cl') <span> {{ $message }}</span> @enderror
        <input placeholder="Tapez le tel" class="@error('tel') is-invalid @enderror" type="text" wire:model="tel">
        @error('tel') <span> {{ $message }}</span> @enderror
        <input placeholder="Tapez email" class="@error('email') is-invalid @enderror" type="text" wire:model="email">
        @error('email') <span> {{ $message }}</span> @enderror
        <input placeholder="Tapez date" class="@error('birth_date') is-invalid @enderror" type="date" wire:model="birth_date">
        @error('birth_date') <span> {{ $message }}</span> @enderror
        <input placeholder="Tapez sexe" class="@error('sexe') is-invalid @enderror" type="text" wire:model="sexe">
        @error('sexe') <span> {{ $message }}</span> @enderror

        <input placeholder="Tapez la fonction" class="@error('fonction_id') is-invalid @enderror" type="hidden" wire:model="fonction_id">
        @error('sexe') <span> {{ $message }}</span> @enderror
    
        <!-- <select wire.model='fonction_id'>
            <option value="default">Sélectionnez</option>
            <option value="def">Sélectionnez</option>
                @foreach($listfonction as $fonct)
                    <option value="{{ $fonct->id}}"> {{ $fonct->fonction }}</option>
                @endforeach
            </select>-->

    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button" wire:click.prevent="update()">Valider</button>
    <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded-full" type="button" wire:click="cancel()">Annuler</button>