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
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="#" wire:click="showForm()" class="btn add-btn" id="add_client"><i class="fa fa-plus"></i> Nouveau Dossier</a>
                    </div>
                </div>
            </div>

            

            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <a href="{{route('compilation.index')}}">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-dollar"></i></span>
                                <div class="dash-widget-info">
                                <h3>{{ isset($solde_caisse) ? number_format($solde_caisse->amount_usd) : 0 }} $</h3>
                                    <span> </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <a href="{{route('short.index' ,['op' => 'byday'])}}">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-cubes"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{$dossier_day}}</h3>
                                    <span>Dossier(s) du jour({{$bigin_date}})</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <a href="{{route('short.index',['op' => 'close'])}}">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-address-card-o"></i></span>
                                <div class="dash-widget-info">
                                    <h3>{{ number_format($montantTotalclose) }} $</h3>
                                    <span>Pour {{$dossiers_close}} Dossier(s) Cloturé</span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">
                    <a href="{{route('compilation.index')}}">
                        <div class="card dash-widget">
                            <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-money"></i></span>
                                <div class="dash-widget-info">
                                <h3>{{ isset($solde_caisse) && isset($solde_caisse->amount_cdf) ? number_format($solde_caisse->amount_cdf) : 0 }} CDF</h3>
                                    <span> </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">

                </div>
                <div class="col-md-4 col-sm-4 col-lg-4 col-xl-4">

                </div>
            </div>

            <hr>

            <div class="row">
                <legend>Filtrez le Dossier</legend>
                <div class="col-sm-5">
                    <input type="text" placeholder="Tapez la plaque du dossier" wire:model.debounce.500ms="query" class="form-control mb-3 col-sm-5 ">
                </div>
            </div>
            <hr>

          

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