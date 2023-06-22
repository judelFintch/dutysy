<div>
    <x-nav_left />
    <div class="page-wrapper">
        <div class="content container-fluid">

        <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Informations Dossiers</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active"></li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="#" wire:click="showform()" class="btn add-btn" id="add_client"><i
                                class="fa fa-plus"></i> Nouveau Dossier</a>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{$dossier_day}}</h3>
                                <span>Dossier(s) du jour</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-usd"></i></span>
                            <div class="dash-widget-info">
                                <h3>{{ $dossiers_close }}</h3>
                                <span>Dossier(s) Cloturé</span>
                                
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-diamond"></i></span>
                            <div class="dash-widget-info">
                                <h3>0</h3>
                                <span>Solde Negatif <b class=" alert-danger">-</b> </span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="card dash-widget">
                        <div class="card-body">
                            <span class="dash-widget-icon"><i class="fa fa-user"></i></span>
                            <div class="dash-widget-info">
                                <h3></h3>
                                <span>Mouvement Jour</span>
                            </div>
                        </div>
                    </div>
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