<div class="max-w-7xl mt-10 mx-auto sm:px-6 lg:px-8">  
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
