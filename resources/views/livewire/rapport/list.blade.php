<div class="row">
    <div class="col-md-12">
        <div class="card border-0 shadow-sm">
            <div class="card-header bg-white d-flex flex-wrap justify-content-between align-items-center">
                <div>
                    <h5 class="card-title mb-0">Journal de caisse</h5>
                    <small class="text-muted">
                        @if($summary['period']['start'] && $summary['period']['end'])
                            Vue du {{ $summary['period']['start']->format('d/m/Y') }} au {{ $summary['period']['end']->format('d/m/Y') }}
                        @else
                            Vue détaillée des mouvements filtrés
                        @endif
                    </small>
                </div>
                <div class="d-flex flex-wrap">
                    <span class="badge badge-success mr-2 mb-1" title="Total des entrées">
                        Entrées : {{ $summary['entries_count'] }}
                    </span>
                    <span class="badge badge-danger mr-2 mb-1" title="Total des sorties">
                        Sorties : {{ $summary['exits_count'] }}
                    </span>
                    <span class="badge {{ ($summary['usd']['net']) >= 0 ? 'badge-primary' : 'badge-warning' }} mb-1" title="Solde net USD">
                        Solde USD : {{ number_format($summary['usd']['net'], 2) }} $
                    </span>
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
                                <th class="text-end">Solde USD</th>
                                <th class="text-end">Solde CDF</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($journalRows as $index => $row)
                            @php
                                $movement = $row['model'];
                            @endphp
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ optional($movement->dossier)->plaque ?? 'N/A' }}</td>
                                <td>{{ date('Y-m-d', strtotime($movement->created_at)) }}</td>
                                <td>
                                    @if($row['debit_usd'])
                                        <span class="badge badge-success">+ {{ number_format($row['debit_usd']) }} $</span>
                                    @endif
                                </td>
                                <td>
                                    @if($row['credit_usd'])
                                        <span class="badge badge-danger">- {{ number_format($row['credit_usd']) }} $</span>
                                    @endif
                                </td>
                                <td>
                                    @if($row['debit_cdf'])
                                        <span class="badge badge-info">+ {{ number_format($row['debit_cdf']) }} FC</span>
                                    @endif
                                </td>
                                <td>
                                    @if($row['credit_cdf'])
                                        <span class="badge badge-warning">- {{ number_format($row['credit_cdf']) }} FC</span>
                                    @endif
                                </td>
                                <td style="max-width: 220px; white-space: normal;">{{ $movement->motif ?: '—' }}</td>
                                <td class="text-end">{{ $movement->beneficiaire ?: 'N/A' }}</td>
                                <td class="text-end">
                                    <span class="badge {{ $row['running_usd'] >= 0 ? 'badge-primary' : 'badge-warning' }}">
                                        {{ number_format($row['running_usd'], 2) }} $
                                    </span>
                                </td>
                                <td class="text-end">
                                    <span class="badge {{ $row['running_cdf'] >= 0 ? 'badge-primary' : 'badge-warning' }}">
                                        {{ number_format($row['running_cdf'], 2) }} FC
                                    </span>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="11" class="text-center py-4 text-muted">
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
                                <th colspan="2">Entrées USD : {{ number_format($summary['usd']['entries'], 2) }} $</th>
                                <th colspan="2">Entrées CDF : {{ number_format($summary['cdf']['entries'], 2) }} FC</th>
                                <th colspan="2">Net USD : {{ number_format($summary['usd']['net'], 2) }} $</th>
                                <th colspan="2">Net CDF : {{ number_format($summary['cdf']['net'], 2) }} FC</th>
                            </tr>
                        </tfoot>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
