<div class="row">
<div class="col-md-12">
    <div class="table-responsive">
        <table class="table table-striped custom-table datatable">
            <thead>
                <tr>
                    <th>#id</th>
                    <th>Date</th>
                    <th>Montant</th>
                    <th>Motif</th>
                    <th>observation</th>
                    <th class="text-end">bénéficiaire</th>
                    <th class="text-end">Action</th>
                </tr>
            </thead>
            <tbody>
                @if(count($mouvements)>0)
                @foreach ($mouvements as $doss)
                @if($doss->type == 'int')
                        <?php $tag = '<span>+</span>'?>
                @else
                        <?php $tag = '-'?>
                @endif
                <tr>
                    <td>{{$idcount+=1}}</td>
                    <td>{{ date("Y-m-d", strtotime($doss->dossier->created_at)) }}
                    </td>
                    <td>
                        @if($doss->type=='int')
                        <span class="badge bg-inverse-success"> +{{ number_format($doss->montant) }} $</span>
                        @else
                        <span class="badge bg-inverse-danger"> - {{ number_format($doss->montant) }} $</span>
                        @endif
                    </td>
                    <td>{{ $doss->motif }}</td>
                    <td>{{ $doss->observation }}</td>
                    <td>{{ $doss->beneficiaire }}</td>
                    <td><a class="badge bg-inverse-success" wire:click="transfert_edit({{$doss->id}})">Transfert</a></td>
                    
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