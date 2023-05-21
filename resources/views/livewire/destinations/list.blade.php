<table class="table-fixed">
  <thead>
    <tr>
      <th>id</th>
      <th>Ville</th>

      <th>Operation</th>
     
     
    </tr>
  </thead>
  <tbody>

  @if(count($destinations)>0)
    @foreach($destinations as $dest)
        <tr>
        <td>{{$idcount++}}</td>
        <td>{{$dest->destination}}</td>
        <td>{{ $dest->id }}</td>
        <td>
           <button  wire:click="edit({{$dest->id}})">  Edit </button>|
           <button  onclick="deleteDest({{$dest->id}})"> delete</button>
        </td>
       
        </tr>
     @endforeach
   

    @else
    <tr>
        <td> Aucune Donnee</td>
        </tr>
    @endif
  
   
  </tbody>
</table>
{{ $test }}

<script>
  function deleteDest(id){
    
    if(confirm("Etes vous sur de supprimer cette enregistrement"))
  
       window.livewire.emit('deleteDest', id);
      }

</script>