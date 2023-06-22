<div class="row filter-row">
    
    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
        <div class="form-group custom-select">
            <select class="select floating">
                <option value="">Toutes</option>
            </select>
        </div>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
        <div class="form-group custom-select">
            <select wire:click='type_op' class="select floating">
                <option>Tout type</option>
                <option> Entree</option>
                <option> Sortie </option>
            </select>
        </div>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
        <div class="form-group form-focus">
            <div class="cal-icon">
                <input class="form-control floating datetimepicker" type="text">
            </div>
            <label class="focus-label">From</label>
        </div>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
        <div class="form-group form-focus">
            <div class="cal-icon">
                <input class="form-control floating datetimepicker" type="text">
            </div>
            <label class="focus-label">To</label>
        </div>
    </div>
    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
        <a href="#" class="btn btn-success w-100"> Search </a>
    </div>
</div>