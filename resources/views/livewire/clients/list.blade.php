
<table>
  <thead>
    <tr>
      <th>id</th>
      <th>Name</th>
      <th>Type</th>
      <th>Tel</th>
      <th>Email</th>
      <th>Rccm</th>
      <th>Email</th>
      <th>Operation</th>
    </tr>
  </thead>
  <tbody>

  @if(count($clients)>0)
    @foreach($clients as $res)
        <tr>
        <td>{{$idcount++}}</td>
        <td>{{$res->name}}</td>
        <td>{{$res->name}}</td>
        <td>{{$res->name}}</td>
        <td>{{$res->name}}</td>
        <td>{{ $res->type }}</td>
        <td>{{ $res->email }}</td>
        
        <td>
           <button  wire:click="edit({{$res->id}})">  Edit </button>|
           <button  onclick="deleteDest({{$res->id}})"> delete</button>
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