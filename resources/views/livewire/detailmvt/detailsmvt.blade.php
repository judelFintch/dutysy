<div>
    <x-nav_left />
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Dossier / <span style="color: brown;">{{$dossier->plaque}}</span></h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">{{$dossier->plaque}} / {{$dossier->client->name}}</li>
                        </ul>
                    </div>
                    @if($dossier->status ===1)
                    <div class="col-auto float-end ms-auto">
                        <a href="#" wire:click="showform()" class="btn add-btn" id="add_client"><i class="fa fa-plus"></i>Operation</a>
                    </div>
                    @endif
                    <div class="col-auto float-end ms-auto">
                        <select wire:model.live="devise" class="form-control @error('id_dossier') is-invalid @enderror">
                            <option value="usd">Rapport usd</option>
                            <option value="cdf">Rapport cdf</option>
                        </select>
                    </div>

                    <div class="col-auto float-end ms-auto">
                        <a href="{{route('print.details',['id'=>$id_dossier])}}" class="btn add-btn" id="add_client"><i class="fa fa-print"></i>Imprimer</a>
                    </div>

                    //a refactored
                    @if($id_dossier <> 23)
                        @if($dossier->status ===1)
                        <div class="col-auto float-end ms-auto">
                            <button onclick="closeFolder({{ $id_dossier }})" class="btn alert-danger" id="add_client"><i class="fa fa-delete"></i>Cloturer</button>
                        </div>
                        @endif
                    @endif

                    <div class="col-auto float-end ms-auto">
                        <select wire:model="id_dossier" class="form-control @error('id_dossier') is-invalid @enderror">
                            @foreach($dossiers as $dossier)
                            <option value="{{$dossier->id}}">{{$dossier->plaque}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>


            @if($id_dossier <> 23)
            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="stats-info">
                        <h6>Entrées </h6>
                        <h4>{{number_format($tt_int)}} <span>$</span></h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="stats-info">
                        <h6 class="text-success">Sortie</h6>
                        <h4>{{number_format($tt_out)}} <span>$</span></h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="stats-info">
                        <h6>Solde</h6>
                        <h4>{{number_format($tt_int-$tt_out)}} <span>$</span></h4>
                    </div>
                </div>
            </div>
         

            <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="stats-info">
                        <h6>Entrées </h6>
                        <h4>{{number_format($tt_int_cdf)}} <span>cdf</span></h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="stats-info">
                        <h6 class="text-success">Sortie</h6>
                        <h4>{{number_format($tt_out_cdf)}} <span>cdf</span></h4>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <div class="stats-info">
                        <h6>Solde</h6>
                        <h4>{{number_format($tt_int_cdf-$tt_out_cdf)}} <span>cdf</span></h4>
                    </div>
                </div>
            </div>

          @else

          <div class="row">
                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <a href="">
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

                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <a href="">
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
            </div>
            

          @endif

          

            <button onclick="goBack()">Retour</button>
            <hr>

            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }} <a href="{{route('ticket.details', ['id' =>$op_print])}}"> Imprimer le recu</a>
            </div>
            @endif
           
                @if($creat)
                @include('livewire.detailmvt.creat')
                @endif
                @if($transfer)
                @include('livewire.detailmvt.transfer')
                @endif

                @if($list)
                @if($devise =='usd')
                @include('livewire.detailmvt.list')
                @else
                @include('livewire.detailmvt.list_cdf')
                @endif

                @endif

            <script>
                function closeFolder(id) {
                    if (confirm("Etes vous sur de vouloir cloture le dossier " + id))
                        window.livewire.emit('closeFolder', id);
                }
            </script>