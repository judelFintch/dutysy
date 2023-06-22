<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>Date</th>
                        <th>Plaque</th>
                     
                        <th>Client</th>
                        <th>Detail</th>
                      
                    </tr>
                </thead>
                <tbody>
                    @if(count($dossiers)>0)
                    
                    @foreach ($dossiers as $doss)
                    <tr>
                        <td>{{$idcount+=1}}</td>
                        <td>{{ date("Y-m-d", strtotime($doss->created_at)) }}</td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="dbb7bea8b7bea2bca9baaebea99bbea3bab6abb7bef5b8b4b6">{{ $doss->plaque }}</a>
                        </td>
                        <td>{{ $doss->client->name  }}</td>
                        <td><a class="btn btn-sm btn-primary" href="{{route('details.mvt',['id'=>$doss->id])}}">Detail</a></td>
                      
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