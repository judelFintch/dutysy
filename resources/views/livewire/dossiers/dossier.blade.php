

    <h1>Dossier Composant</h1>
        @if (session()->has('message'))
            <div class="alert alert-success">
                 {{ session('message') }}
             </div>
     @endif
    <br/>
    <br/><br>

    @include('livewire.dossiers.creat')

<div>
    {{-- In work, do what you enjoy. --}}
</div>

</div>
