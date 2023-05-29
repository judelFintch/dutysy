<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>Client</th>
                        <th>Type</th>
                        <th>Plaque</th>
                        <th>Provenance</th>
                       
                        <th>Montant</th>
                        <th>Motif</th>
                        <th class="text-end">Beneficiaire</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($mouvements)>0)
                    @foreach ($mouvements as $doss)
                    <tr>
                        <td>{{$idcount+=1}}</td>
                        <td>
                            <h2 class="table-avatar">
                                <a href="profile">{{ $doss->dossier->client->name}}<span></span></a>
                            </h2>
                        </td>
                        <td>{{ $doss->type }}</td>
                        <td><a href="/cdn-cgi/l/email-protection" class="__cf_email__"
                                data-cfemail="dbb7bea8b7bea2bca9baaebea99bbea3bab6abb7bef5b8b4b6">{{ $doss->plaque }}</a>
                        </td>
                        <td>{{ $doss->dossier->provenance }}</td>
                       
                        <td>{{ number_format($doss->montant) }} $</td>
                        <td>{{ $doss->motif }}</td>
                        <td>{{ $doss->beneficiaire }}</td>
                        
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