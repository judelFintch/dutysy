<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>Detail</th>
                        <th>Date</th>
                        <th>Plaque(s)</th>
                        <th>Types</th>
                        <th>Client</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($dossiers)>0)
                    @foreach ($dossiers as $doss)
                    <tr>
                        <td>{{$idcount+=1}}</td>
                        <td><a class="btn btn-sm btn-warning" href="{{route('details.mvt',['id'=>$doss->id, 'devise' => $devise])}}">Detail</a></td>
                        <td>{{ date("Y-m-d", strtotime($doss->created_at)) }}</td>
                        <td><a href="{{route('details.mvt',['id'=>$doss->id, 'devise' => $devise])}}">{{ $doss->plaque }}</a>
                        </td>
                        <td>{{ $doss->type_marchandise }}</td>
                        <td>{{ $doss->client->name  }}</td>
                            @if($archive)


                                <td>
                                    <button class="btn btn-danger">Archives</button>
                                </td>
                            @endif
            
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td> Aucune Donnee</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function deleteCli(id) {
        if (confirm("Etes vous sur de supprimer cette enregistrement"))
            window.livewire.emit('deleteCli', id);
    }
</script>