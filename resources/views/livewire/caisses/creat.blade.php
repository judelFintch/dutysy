<div id="form-client">
    <div class="row">
        <!-- Intitulé de la caisse -->
        <div class="col-sm-6">
            <div class="form-group">
                <input class="form-control @error('caisseName') is-invalid @enderror" type="text"
                    placeholder="Intitulé Caisse" wire:model="caisseName">
                @error('caisseName')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Montant en USD -->
        <div class="col-sm-6">
            <div class="form-group">
                <input class="form-control @error('amountUsd') is-invalid @enderror" type="number"
                    placeholder="Montant en USD" wire:model="amountUsd">
                @error('amountUsd')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <!-- Montant en CDF -->
        <div class="col-sm-6">
            <div class="form-group">
                <input class="form-control @error('amountCdf') is-invalid @enderror" type="number"
                    placeholder="Montant en CDF" wire:model="amountCdf">
                @error('amountCdf')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>

        <!-- Type de caisse -->
        <div class="col-sm-6">
            <div class="form-group">
                <select wire:model="typeCaisse" class="form-control @error('typeCaisse') is-invalid @enderror">
                    <option value="">Type de caisse</option>
                    @foreach ($typeCaisseOptions as $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
                @error('typeCaisse')
                    <span class="text-danger">{{ $message }}</span>
                @enderror
            </div>
        </div>
    </div>

    <div class="submit-section">
        <button type="button" wire:click.prevent="store" class="btn btn-primary submit-btn">Enregistrer</button>
    </div>
</div>
