<div>
    <x-nav_left />
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Etat Finaciers</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Dossier</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="{{ route('transactions.report') }}" class="btn add-btn"><i class="fa fa-plus"></i>
                            Rapport</a>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="{{ route('transactions.index') }}" class="btn add-btn"><i class="fa fa-plus"></i>
                            Retrait</a>
                    </div>
                </div>
            </div>
            @if (session()->has('message'))
                <div class="alert alert-success">
                    {{ session('message') }}
                </div>
            @endif
            @if ($list)
                @include('livewire.caisses.caisse_list')
            @endif
            @if ($isCreating)
                @include('livewire.banque.create')
            @endif
        </div>
    </div>
    <div>
