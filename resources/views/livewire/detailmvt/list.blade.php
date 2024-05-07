<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>Date</th>
                        <th>Débit USD</th>
                        <th>Crédit USD</th>
                        <th>Débit CDF</th>
                        <th>Crédit CDF</th>
                        <th>Motif</th>
                       
                        <th class="text-end">Bénéficiaire</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if(count($mouvements) > 0)
                        @foreach ($mouvements as $doss)
                        <tr>
                            <td>{{$loop->iteration}}</td>
                            <td>{{ date("Y-m-d", strtotime($doss->date_created)) }}</td>
                            
                            <!-- Gestion des montants en USD -->
                            @if($doss->type == 'int')
                                <td><span class="badge bg-inverse-success"> + {{ number_format($doss->amount_usd) }} $</span></td>
                                <td></td>
                            @elseif($doss->type == 'out')
                                <td></td>
                                <td><span class="badge bg-inverse-danger"> - {{ number_format($doss->amount_usd) }} $</span></td>
                            @else
                                <td></td>
                                <td></td>
                            @endif

                            <!-- Gestion des montants en CDF -->
                            @if($doss->type == 'int')
                                <td><span class="badge bg-inverse-info"> + {{ number_format($doss->amount_cdf) }} FC</span></td>
                                <td></td>
                            @elseif($doss->type == 'out')
                                <td></td>
                                <td><span class="badge bg-inverse-warning"> - {{ number_format($doss->amount_cdf) }} FC</span></td>
                            @else
                                <td></td>
                                <td></td>
                            @endif

                            <td>{{ $doss->motif }}</td>
                            
                            <td class="text-end">{{ $doss->beneficiaire }}</td>
                            <td class="text-end">
                                @if($doss->dossier && $doss->dossier->status == 1)
                                    <a class="badge bg-inverse-warning" wire:click="transfert_edit({{$doss->id}})">Operations</a>
                                    <button onclick="deleteMvt({{$doss->id}})" class="btn btn-danger">Del</button>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10"> Aucune Donnée</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
function deleteMvt(id) {
    if (confirm("Etes vous sur de supprimer cet enregistrement ?")) {
        window.livewire.emit('deleteMvt', id);
    }
}
</script>
