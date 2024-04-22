<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-striped custom-table datatable">
                <thead>
                    <tr>
                        <th>#id</th>
                        <th>#Detail</th>
                        <th>Date</th>
                        <th>Dossier</th>
                        <th>USD</th>
                        <th>CDF</th>
                        <th>Motif</th>
                        <th>observation</th>
                        <th class="text-end">bénéficiaire</th>

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
                        <td><a class="btn btn-sm btn-warning" href="{{route('details.mvt',['id'=>$doss->id, 'devise' => $devise])}}">Detail</a></td>
                        <td>{{ date("Y-m-d", strtotime($doss->created_at)) }}
                        </td>

                        <td>{{ $doss->dossier->plaque ?? 0 }}
                        </td>
                        <td>
                            @if($doss->type=='int')
                            <span class="badge bg-inverse-success"> +{{ number_format($doss->amount_usd) }} $</span>
                            @else
                            <span class="badge bg-inverse-danger"> - {{ number_format($doss->amount_usd) }} $</span>
                            @endif
                        </td>

                        <td>
                            @if($doss->type=='int')
                            <span class="badge bg-inverse-success"> +{{ number_format($doss->amount_cdf) }} $</span>
                            @else
                            <span class="badge bg-inverse-danger"> - {{ number_format($doss->amount_cdf) }} $</span>
                            @endif
                        </td>
                        <td>{{ $doss->motif }}</td>
                        <td>{{ $doss->observation }}</td>
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