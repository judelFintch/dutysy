<div>
    <x-nav_left />
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Employés</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Client</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="#" wire:click="showform()" class="btn add-btn" id="add_client"><i
                                class="fa fa-plus"></i> Ajouter Employer</a>
                    </div>
                </div>
            </div>
           
            @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            
            
            @if($updateemployees)
            @include('livewire.employers.update')
            @endif
            @if($creat)
            @include('livewire.employers.creat')
            @endif
            @include('livewire.employers.list')
        </div>


    </div>
</div>