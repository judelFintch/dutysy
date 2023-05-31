<div>
    <x-nav_left />
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Dossier</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Dossier</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="#" wire:click="showform()" class="btn add-btn" id="add_client"><i
                                class="fa fa-plus"></i> Nouveau Dossier</a>
                    </div>
                </div>
            </div>


            <div class="row filter-row">
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <div class="form-group form-focus">
                            <input type="text" class="form-control floating">
                            <label class="focus-label">Plaque</label>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <div class="form-group custom-select">
                            <select class="select floating">
                              
                            </select>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3 col-lg-3 col-xl-2 col-12">
                        <div class="form-group custom-select">
                            <select class="select floating">
                               
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

            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            @if($update_dossier)
                 @include('livewire.dossiers.update')

            @endif
            @if($creat)
                @include('livewire.dossiers.creat')
            @endif

            @if($list)
                 @include('livewire.dossiers.list')
            @endif
        </div>
    </div>
</div>