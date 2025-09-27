@php
    $total_usd = 0;
    $total_cdf = 0;
    $intCount = 0;
    $outCount = 0;
@endphp

<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white d-flex flex-wrap justify-content-between align-items-center">
                <div>
                    <h5 class="card-title mb-0">Journal de caisse</h5>
                    <small class="text-muted">Vue détaillée des mouvements filtrés</small>
                </div>
                <div class="d-flex flex-wrap">
                    <span class="badge badge-success mr-2 mb-1">Entrées : {{ $mouvements->where('type', 'int')->count() }}</span>
                    <span class="badge badge-danger mb-1">Sorties : {{ $mouvements->where('type', 'out')->count() }}</span>
                </div>
            </div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover table-striped align-middle mb-0">
                        <caption class="px-3 text-muted">{{ $mouvements->count() ? 'Liste triée par date croissante' : 'Aucun mouvement trouvé pour les filtres appliqués' }}</caption>
                        <thead class="table-light">
                            <tr>
                                <th>#</th>
                                <th>Dossier</th>
                                <th>Date</th>
                                <th>Débit USD</th>
                                <th>Crédit USD</th>
                                <th>Débit CDF</th>
                                <th>Crédit CDF</th>
                                <th>Motif</th>
                                <th class="text-end">Bénéficiaire</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($mouvements as $doss)
                            @php
                                $isEntry = $doss->type === 'int';
                                $debitUsd = $isEntry ? $doss->amount_usd : 0;
                                $creditUsd = !$isEntry ? $doss->amount_usd : 0;
                                $debitCdf = $isEntry ? $doss->amount_cdf : 0;
                                $creditCdf = !$isEntry ? $doss->amount_cdf : 0;
                                $total_usd += $debitUsd;
                                $total_usd -= $creditUsd;
                                $total_cdf += $debitCdf;
                                $total_cdf -= $creditCdf;
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ optional($doss->dossier)->plaque ?? 'N/A' }}</td>
                                <td>{{ date('Y-m-d', strtotime($doss->created_at)) }}</td>
                                <td>
                                    @if($debitUsd)
                                        <span class="badge badge-success">+ {{ number_format($debitUsd) }} $</span>
                                    @endif
                                </td>
                                <td>
                                    @if($creditUsd)
                                        <span class="badge badge-danger">- {{ number_format($creditUsd) }} $</span>
                                    @endif
                                </td>
                                <td>
                                    @if($debitCdf)
                                        <span class="badge badge-info">+ {{ number_format($debitCdf) }} FC</span>
                                    @endif
                                </td>
                                <td>
                                    @if($creditCdf)
                                        <span class="badge badge-warning">- {{ number_format($creditCdf) }} FC</span>
                                    @endif
                                </td>
                                <td style="max-width: 220px; white-space: normal;">{{ $doss->motif }}</td>
                                <td class="text-end">{{ $doss->beneficiaire ?: 'N/A' }}</td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="9" class="text-center py-4 text-muted">
                                    <i class="la la-inbox d-block mb-2" style="font-size: 2rem;"></i>
                                    Aucun mouvement ne correspond aux filtres sélectionnés
                                </td>
                            </tr>
                            @endforelse
                        </tbody>
                        @if($mouvements->count())
                        <tfoot class="table-info">
                            <tr>
                                <th colspan="3">Solde cumulé</th>
                                <th colspan="2">{{ number_format($total_usd) }} $</th>
                                <th colspan="2">{{ number_format($total_cdf) }} FC</th>
                                <th colspan="2"></th>
                            </tr>
                        </tfoot>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
