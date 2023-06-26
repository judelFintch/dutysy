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
                    <div class="col-auto float-end ms-auto">
                        <a href="#" wire:click="showform()" class="btn add-btn" id="add_client"><i
                                class="fa fa-plus"></i>Operation</a>
                    </div>

                    <div class="col-auto float-end ms-auto">
                        <a href="{{route('print.details',['id'=>$id_dossier])}}" class="btn add-btn" id="add_client"><i
                                class="fa fa-print"></i>Imprimer</a>
                    </div>
                    <div class="col-auto float-end ms-auto">
                       <button  onclick="closeFolder({{ $id_dossier }})" class="btn alert-danger" id="add_client"><i
                                class="fa fa-delete"></i>Cloturer</button>
                    </div>

                    <div class="col-auto float-end ms-auto">
                        <select wire:model="id_dossier" class="form-control @error('id_dossier') is-invalid @enderror">
                            @foreach($dossiers as $dossier)
                                     <option value="{{$dossier->id}}">{{$dossier->plaque}}</option>
                            @endforeach
                        </select>

                    </div>
                </div>
            </div>

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

            @include('livewire.detailmvt.list')
            @endif


    <script>
        function closeFolder(id) {
            if (confirm("Etes vous sur de vouloir cloture le dossier " +id))
                window.livewire.emit('closeFolder', id);
        }
    </script>