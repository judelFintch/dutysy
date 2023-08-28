<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>Date</th>
                        <th>Débit</th>
                        <th>Crédit</th>
                        <th>Motif</th>
                        <th>Observation</th>
                        <th class="text-end">Bénéficiaire</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($mouvements) > 0)
                    @foreach ($mouvements as $doss)
                    <tr>
                        <td>{{$idcount+=1}}</td>
                        <td>{{ date("Y-m-d", strtotime($doss->created_at)) }}</td>
                        
                        @if($doss->type=='int')
                        <td>
                            <span class="badge bg-inverse-success"> + {{ number_format($doss->montant) }} $</span>
                        </td>
                        <td></td> <!-- No credit column for 'int' type -->
                        @endif

                        @if($doss->type=='out')
                        <td></td> <!-- No debit column for 'out' type -->
                        <td>
                            <span class="badge bg-inverse-danger"> - {{ number_format($doss->montant) }} $</span>
                        </td>
                        @endif

                        <td>{{ $doss->motif }}</td>
                        <td>{{ $doss->observation }}</td>
                        <td>{{ $doss->beneficiaire }}</td>
                        <td>
                            @if($doss->dossier->status==1)
                            <a class="badge bg-inverse-warning" wire:click="transfert_edit({{$doss->id}})">Operations</a>
                            <button onclick="deleteMvt({{$doss->id}})" class="btn btn-danger">Del</button>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    @else
                    <tr>
                        <td> Aucune Donnée</td>
                    </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function deleteMvt(id) {
    if (confirm("Etes vous sur de supprimer cet enregistrement ?"))
        window.livewire.emit('deleteMvt', id);
}
</script>
