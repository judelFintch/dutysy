<div id="form-client">
<legend><h2>Operation Transfert</h2></legend>
    <div class="row">
        <div class="col-sm-6">
            <input type="hidden" wire:model="id_mouvement_tr">
            <div class="form-group">
                <input type="number" class="form-control" type="text" placeholder="Saisisez le montant"
                    class="@error('montant_tr') is-invalid @enderror" type="text" wire:model="montant_tr">
                @error('montant_tr') <span> {{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <input wire:model="type_tr"  class="form-control @error('motif') is-invalid @enderror">
              
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">

                <input class="form-control" placeholder="beneficiaire" class="@error('_tr') is-invalid @enderror"
                    type="text" wire:model="beneficiaire_tr">
                @error('beneficiaire_tr') <span> {{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-sm-6">
        <select wire:model="id_dossier_tr" class="form-control @error('id_dossier_tr') is-invalid @enderror">
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
                    type="text" wire:model="observation">
                @error('observation') <span> {{ $message }}</span> @enderror
            </div>
        </div>
        <div class="submit-section">
            <button type="button" wire:click.prevent="update_tranfert()" class="btn btn-primary">Valider</button>
        </div>
    </div>
</div>