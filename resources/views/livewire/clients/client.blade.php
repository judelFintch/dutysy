
<div class="max-w-7xl mt-10 mx-auto sm:px-6 lg:px-8">  
   
<h1>Client Composant</h1>
    @if (session()->has('message'))
        <div class="alert alert-success">
             {{ session('message') }}
         </div>
 @endif
<br/>
<br/><br>

    @if($updateclient)
        @include('livewire.clients.update')
    @else
        @include('livewire.clients.creat')
    @endif
        @include('livewire.clients.list')

</div>