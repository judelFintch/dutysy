<div>

    <h1>Employees Composant</h1>
        @if (session()->has('message'))
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
    @endif
    <br/>
    {{$fonction_id}}
    @if($updateemployees)
        @include('livewire.employers.update')
    @else
        @include('livewire.employers.creat')
    @endif

    @include('livewire.employers.list')
        
    </div>
