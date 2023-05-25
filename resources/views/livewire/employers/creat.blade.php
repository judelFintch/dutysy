<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <input class="form-control" placeholder="Nom Employer" class="@error('firs_name') is-invalid @enderror"
                type="text" wire:model="first_name">
            @error('first_name') <span> {{ $message }}</span> @enderror

        </div>
    </div>
    <div class="col-sm-6">
        <input class="form-control" placeholder="Tapez le post nom" class="@error('second_name') is-invalid @enderror"
            type="text" wire:model="second_name">
        @error('type_cl') <span> {{ $message }}</span> @enderror

    </div>
</div>
<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <input class="form-control" placeholder="Tapez le tel" class="@error('tel') is-invalid @enderror"
                type="text" wire:model="tel">
            @error('tel') <span> {{ $message }}</span> @enderror
        </div>
    </div>

    <div class="col-sm-6">
        <input class="form-control" placeholder="Tapez email" class="@error('email') is-invalid @enderror" type="text"
            wire:model="email">
        @error('email') <span> {{ $message }}</span> @enderror
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">
            <input class="form-control" placeholder="Tapez date" class="@error('birth_date') is-invalid @enderror"
                type="date" wire:model="birth_date">
            @error('birth_date') <span> {{ $message }}</span> @enderror
        </div>
    </div>
    <div class="col-sm-6">
        <input class="form-control" placeholder="Tapez sexe" class="@error('sexe') is-invalid @enderror" type="text"
            wire:model="sexe">
        @error('sexe') <span> {{ $message }}</span> @enderror

    </div>
</div>

<input class="form-control" placeholder="Tapez la fonction" class="@error('fonction_id') is-invalid @enderror"
    type="hidden" wire:model="fonction_id">
@error('sexe') <span> {{ $message }}</span> @enderror

<!-- <select wire.model='fonction_id'>
<option value="default">Sélectionnez</option>
<option value="def">Sélectionnez</option>
@foreach($listfonction as $fonct)
<option value="{{ $fonct->id}}"> {{ $fonct->fonction }}</option>
@endforeach
</select>-->

<button class="btn btn-primary" type="button"
    wire:click.prevent="store()">Valider</button>