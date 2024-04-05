
<div id="form-client">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                <input type="number" class="form-control" type="text" placeholder="Saisisez le montant"
                    class="@error('montant') is-invalid @enderror" type="text" wire:model.defer="montant">
                @error('montant') <span> {{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <select wire:model.defer="Opdevise" class="form-control @error('devise') is-invalid @enderror">
                <option value="">Devise</option>
                <option value="usd">USD</option>
                <option value="cdf">CDF</option>
            </select>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
            <select wire:model.defer="listCaisse" class="form-control @error('motif') is-invalid @enderror">
                <option value="">Choisisez la Caisses</option>
                @foreach ($caisses as $caisse)
                     <option value="{{$caisse->id}}">{{$caisse->name_caisse}} USD : {{$caisse->montant}} - CDF: {{$caisse->amount_cdf}}</option>
                @endforeach
            </select>
            </div>
        </div>
        <div class="col-sm-6">
            <select wire:model.defer="type" class="form-control @error('motif') is-invalid @enderror">
                <option value="">Operation</option>
                <option value="int">Entree</option>
                <option value="out">Sortie</option>
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">

                <input class="form-control" placeholder="beneficiaire" class="@error('beneficiaire') is-invalid @enderror"
                    type="text" wire:model.defer="beneficiaire">
                @error('beneficiaire') <span> {{ $message }}</span> @enderror
            </div>
        </div>
        <div class="col-sm-6">
            <input class="form-control" placeholder="Motif" class="@error('motif') is-invalid @enderror" type="text"
                wire:model.defer="motif">
            @error('motif') <span> {{ $message }}</span> @enderror
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
            <form>
                     @csrf
                    <button type="button" wire:click.prevent="store()" class="btn btn-primary">Valider</button>
            </form>
        </div>
    </div>
</div>