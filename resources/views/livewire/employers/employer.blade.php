<div>



@if($updateemployees)
    @include('livewire.employers.update')
@else
    @include('livewire.employers.creat')
@endif

@include('livewire.employers.list')
    
</div>
