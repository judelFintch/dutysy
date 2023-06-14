<div id="form-client">
<legend><h2>Operation Transfert</h2></legend>
    <div class="row">
        <div class="col-sm-6">
            <input type="hidden" wire:model.defer="id_mouvement_tr">
            <div class="form-group">
                <input type="number" class="form-control" type="text" placeholder="Saisisez le montant"
                    class="@error('montant_tr') is-invalid @enderror" type="text" wire:model.defer="montant_tr">
                @error('montant_tr') <span> {{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <input wire:model="type_tr" readonly class="form-control @error('type_tr') is-invalid @enderror">
            @error('type_tr') <span> {{ $message }}</span> @enderror
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">

                <input class="form-control" placeholder="beneficiaire" class="@error('beneficiaire_tr') is-invalid @enderror"
                    type="text" wire:model.defer="beneficiaire_tr">
                @error('beneficiaire_tr') <span> {{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-sm-6">
        <select wire:model.defer="id_dossier_tr" class="form-control @error('id_dossier_tr') is-invalid @enderror">
            <option value=''>-- Selectionnez le Dossier --</option>
            <option value="{{$id_dossier}}"> Update </option>
            @foreach($dossiers as $dossier)
                <option value="{{$dossier->id}}">{{$dossier->plaque}}</option>
            @endforeach
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <input class="form-control" placeholder="Observation" class="@error('observation') is-invalid @enderror"
                    type="text" wire:model.defer="observation">
                @error('observation') <span> {{ $message }}</span> @enderror
            </div>
        </div>
        <div class="submit-section">
            <button type="button" wire:click.prevent="update_tranfert()" class="btn btn-primary">Valider</button>
        </div>
    </div>
</div>