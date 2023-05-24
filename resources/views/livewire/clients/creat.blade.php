<div class="row">
    <div class="col-sm-6">
        <div class="form-group">

            <input class="form-control" type="text" placeholder="Saisisez le nom"
                class="@error('name_cl') is-invalid @enderror" type="text" wire:model="name_cl">
            @error('name_cl') <span> {{ $message }}</span> @enderror

        </div>
    </div>
    <div class="col-sm-6">

        <input class="form-control" type="text" placeholder="Tapez le nom d"
            class="@error('name_cl') is-invalid @enderror" type="text" wire:model="name_cl">
        @error('name_cl') <span> {{ $message }}</span> @enderror
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">

            <input class="form-control" placeholder="Tapez le nom type client"
                class="@error('type_cl') is-invalid @enderror" type="text" wire:model="type_cl">
            @error('type_cl') <span> {{ $message }}</span> @enderror

        </div>
    </div>
    <div class="col-sm-6">

        <input class="form-control" placeholder="Tapez le nom type tel" class="@error('tel_cl') is-invalid @enderror"
            type="text" wire:model="tel_cl">
        @error('tel_cl') <span> {{ $message }}</span> @enderror
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">

            <input class="form-control" placeholder="Tapez email" class="@error('email_cl') is-invalid @enderror"
                type="text" wire:model="email_cl">
            @error('email_cl') <span> {{ $message }}</span> @enderror

        </div>
    </div>
    <div class="col-sm-6">

        <input class="form-control" placeholder="Tapez le nom rccm" class="@error('rccm_cl') is-invalid @enderror"
            type="text" wire:model="rccm_cl">
        @error('rccm_cl') <span> {{ $message }}</span> @enderror
    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        <div class="form-group">

            <input class="form-control" placeholder="Tapez l'adresse" class="@error('adresse_cl') is-invalid @enderror"
                type="text" wire:model="adresse_cl">
            @error('adresse_cl') <span> {{ $message }}</span> @enderror

        </div>
    </div>
    <div class="col-sm-6">

        <input class="form-control" placeholder="Tapez idnat" class="@error('idnat_cl') is-invalid @enderror"
            type="text" wire:model="idnat_cl">
        @error('idnat_cl') <span class=" alert-danger"> {{ $message }}</span> @enderror

    </div>

    <div class="submit-section">
        <button type="button" wire:click.prevent="store()" class="btn btn-primary submit-btn">Save</button>
    </div>