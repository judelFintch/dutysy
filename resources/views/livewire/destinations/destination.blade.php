<div>
<x-nav_left />
<div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Destination</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active">Destination</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <a href="#" wire:click="showform()" class="btn add-btn" id="add_client"><i
                                class="fa fa-plus"></i> Destination</a>
                    </div>
                </div>
            </div>
        @if (session()->has('message'))
                        <div class="alert alert-success">
                        {{ session('message') }}
                        </div>
        @endif

        @if($updated_dest)
                 @include('livewire.destinations.update') 
         @else
                 @include('livewire.destinations.creat') 

        @endif
        <p>
                <br/>
          @include('livewire.destinations.list')  
        </p>
        
</div>
