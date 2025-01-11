<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-bordered table-striped table-hover custom-table datatable">
                <thead class="table-primary text-center" style="position: sticky; top: 0; z-index: 1;">
                    <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>Débit USD</th>
                        <th>Crédit USD</th>
                        <th>Débit CDF</th>
                        <th>Crédit CDF</th>
                        <th>Motif</th>
                        <th>Bénéficiaire</th>
                        <th>Observation</th>
                        <th class="text-end">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @if (count($mouvements) > 0)
                        @foreach ($mouvements as $doss)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ date('Y-m-d', strtotime($doss->date_created)) }}</td>

                                <!-- Gestion des montants en USD -->
                                @if ($doss->type == 'int')
                                    <td><span class="badge bg-success">+ {{ number_format($doss->amount_usd) }} $</span>
                                    </td>
                                    <td></td>
                                @elseif($doss->type == 'out')
                                    <td></td>
                                    <td><span class="badge bg-danger">- {{ number_format($doss->amount_usd) }} $</span>
                                    </td>
                                @else
                                    <td></td>
                                    <td></td>
                                @endif

                                <!-- Gestion des montants en CDF -->
                                @if ($doss->type == 'int')
                                    <td><span class="badge bg-info">+ {{ number_format($doss->amount_cdf) }} FC</span>
                                    </td>
                                    <td></td>
                                @elseif($doss->type == 'out')
                                    <td></td>
                                    <td><span class="badge bg-warning">- {{ number_format($doss->amount_cdf) }}
                                            FC</span></td>
                                @else
                                    <td></td>
                                    <td></td>
                                @endif

                                <td>{{ $doss->motif }}</td>
                                <td>{{ $doss->beneficiaire }}</td>
                                <td>{{ $doss->observation }}</td>
                                <td class="text-end">
                                    @if ($doss->dossier && $doss->dossier->status == 1)
                                        <a class="btn btn-sm btn-warning text-white"
                                            wire:click="transfert_edit({{ $doss->id }})">Modifier</a>
                                        <button onclick="deleteMvt({{ $doss->id }})"
                                            class="btn btn-sm btn-danger">Supprimer</button>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="10" class="text-center">Aucune donnée disponible</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    function deleteMvt(id) {
        if (confirm("Êtes-vous sûr de vouloir supprimer cet enregistrement ?")) {
            window.livewire.emit('deleteMvt', id);
        }
    }
</script>
