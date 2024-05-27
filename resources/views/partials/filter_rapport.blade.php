<div class="row filter-row">
<form wire:submit.prevent="submit" class="w-100">
    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
        <div class="form-group custom-select">
            <select wire:model="selectClients" class="select floating">
                <option value="">Toutes</option>
            </select>
        </div>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
        <div class="form-group custom-select">
            <select wire:change.live="selectOpType" id="type_op" name="type_op" class="select floating">
                <option>Tout type</option>
                <option> Entree</option>
                <option> Sortie </option>
            </select>
        </div>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
        <div class="form-group form-focus">
            <div class="cal-icon">
                <input wire:model="bigin_date" class="form-control floating datetimepicker" onchange="Livewire.emit('setDate', this.value)" >
            </div>
            <label class="focus-label">From</label>
        </div>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
        <div class="form-group form-focus">
            <div class="cal-icon">
                <input wire:model.defer="end_date" class="form-control floating datetimepicker" type="text">
            </div>
            <label class="focus-label">To</label>
        </div>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
        <form>
               <button type="button" wire:click="filter()" class="btn btn-success w-100"> Search </button>
        </form>
    </div>
</div>