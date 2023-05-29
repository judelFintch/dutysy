<div id="form-client" >
<div class="row" >
    <div class="col-sm-6">
        <div class="form-group">

            <input class="form-control" type="text" placeholder="Intitule Caisse"
                class="@error('caisse_name') is-invalid @enderror" type="text" wire:model="caisse_name">
            @error('caisse_name') <span> {{ $message }}</span> @enderror

        </div>
    </div>
    <div class="col-sm-6">
        

        <input class="form-control" placeholder="Montant" class="@error('init_montant') is-invalid @enderror"
            type="text" wire:model="init_montant">
        @error('init_montant') <span class=" alert-danger"> {{ $message }}</span> @enderror

    </div>
</div>

<div class="row">
    <div class="col-sm-6">
        
        <div class="form-group">
        <select wire:model="type_caisse" class="form-control @error('type_caisse') is-invalid @enderror">
            <option value="">Type caisse</option>
            <option>Declaration</option>
            <option>Fonctionnement</option>
            <option>Divers</option>
            <option>Depense Courante</option>
        </select>
       
        </div>
    </div>

    <div class="submit-section">
        <button type="button" wire:click.prevent="store()" class="btn btn-primary submit-btn">Save</button>
    </div>
</div>

</div>