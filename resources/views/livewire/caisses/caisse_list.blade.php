<table class="table table-bordered table-striped table-hover">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th><i class="fa fa-archive"></i> Nom de la Caisse</th>
            <th><i class="fa fa-dollar-sign"></i> Montant (USD)</th>
            <th><i class="fa fa-money-bill-wave"></i> Montant (CDF)</th>
            <th><i class="fa fa-money-bill-wave"></i> Type</th>
            <th><i class="fa fa-cogs"></i> Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($detailsCaisse as $index => $res)
            <tr>
                <td>{{ $index + 1 }}</td>
                <td>{{ $res->name_caisse }}</td>
                <td class="text-success font-weight-bold">{{ number_format($res->amount_usd, 2) }} $</td>
                <td class="text-primary font-weight-bold">{{ number_format($res->amount_cdf, 0, ',', ' ') }} CDF</td>
                <td>{{ $res->type_caisse }}</td>
                <td>
                    <a href="" class="btn btn-primary btn-sm">
                        <i class="fa fa-eye"></i> Voir
                    </a>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
