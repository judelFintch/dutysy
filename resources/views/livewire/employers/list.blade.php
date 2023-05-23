<table class="table-fixed">
  <thead>
    <tr>
      <th>id</th>
      <th>Ville</th>

      <th>Operation</th>
     
     
    </tr>
  </thead>
  <tbody>

  @if(count($employees)>0)
    @foreach($employees as $resu)
        <tr>
        <td>{{$idcount++}}</td>
        <td>{{$resu->first_name}}</td>
        <td>{{$resu->second_name}}</td>
        <td>{{ $resu->fonction->fonction }}</td>
        <td>
           <button  wire:click="edit({{$resu->id}})">  Edit </button>|
           <button  onclick="deleteDest({{$resu->id}})"> delete</button>
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


<script>
  function deleteDest(id){
    
    if(confirm("Etes vous sur de supprimer cette enregistrement"))
  
       window.livewire.emit('deleteDest', id);
      }

</script>