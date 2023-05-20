<div class="max-w-7xl mt-10 mx-auto sm:px-6 lg:px-8">  
@if (session()->has('message'))
        <div class="alert alert-success">
        {{ session('message') }}
        </div>
 @endif
        @include('livewire.destinations.creat') 
        <hr>
        
        @include('livewire.destinations.list')  
        
        
</div>
