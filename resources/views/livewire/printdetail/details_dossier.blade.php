<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details {{$dossier->plaque}}</title>
    <style>
        @media print {
            @page {
                margin: 0;
            }

            body * {
                visibility: hidden;
            }

            #contenu,
            #contenu * {
                visibility: visible;
            }

            #contenu {
                position: static;
                max-width: none;
                padding: 0;
                background-color: transparent;
                box-shadow: none;
                margin-top: -130px;
            }

            .page-wrapper {
                padding: 20px;
            }

            .invoice-logo {
                max-width: 200px;
            }

            .invoice-details h3 {
                margin-top: 0;
            }

            .invoice-details ul {
                padding-left: 0;
                list-style-type: none;
            }

            .invoice-details li {
                margin-bottom: 5px;
            }

            .payslip-title {
                margin-top: 20px;
                margin-bottom: 10px;
            }

            .table-bordered th,
            .table-bordered td {
                border: 1px solid #dee2e6;
                padding: 8px;
                text-align: center;
            }

            .table-bordered th {
                background-color: #f2f2f2;
            }

            .float-end {
                float: right;
            }
        }
    </style>
</head>

<body>
    <div class="page-wrapper">
        <div class="content container-fluid">
            <div class="page-header">
                <div class="row align-items-center">
                    <div class="col">
                        <h3 class="page-title">Details {{$dossier->plaque}}</h3>
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{route('dossier.index')}}">Dashboard</a></li>
                            <li class="breadcrumb-item active">{{$dossier->plaque}}</li>
                        </ul>
                    </div>
                    <div class="col-auto float-end ms-auto">
                        <div class="btn-group btn-group-sm">
                            <button class="btn btn-white">CSV</button>
                            <button class="btn btn-white">PDF</button>
                            <button onclick="imprimerPartie()" class="btn btn-white"><i class="fa fa-print fa-lg"></i>
                                Print</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div id="contenu" class="card-body">
                            <div class="row">
                                <div class="col-sm-6 m-b-20">
                                    <img src="{{asset('assets/img/new-castorms.jpg')}}" class="invoice-logo" alt="">
                                    <ul class="list-unstyled mb-0">
                                        <li><span>STE LA MANNE DE BRAVE SARL</span></li>
                                        <li>960, Chaussé LDK, Batiment Methodiste, 2 eme Niveau</li>
                                        <li>IDNAT: 05-H4901-N57665K</li>
                                        <li>Lshi/RCCM 15-B-3463, NIF:A1008059X</li>
                                    </ul>
                                </div>
                                <div class="col-sm-6 m-b-20">
                                    <div class="invoice-details">
                                        <h3 class="text-uppercase">#{{$dossier->plaque}}/ {{date('y-d')}}</h3>
                                        <ul class="list-unstyled">
                                            <li>Date : <span>{{date('Y-D-M')}}</span></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 m-b-20">
                                    <ul class="list-unstyled">
                                        <li>
                                            <h5 class="mb-0"><strong>{{$client->name}}</strong></h5>
                                        </li>
                                        <li>{{$client->rccm}}</li>
                                        <li>{{$client->idnat}}</li>
                                        <li>{{$client->adresse}}</li>
                                        <li>{{$client->tel}}</li>
                                    </ul>
                                </div>
                            </div>
                            <h4 class="payslip-title">{{$dossier->plaque}}/ {{date('y-d')}}-{{$dossier->client->name}}</h4>
                            <div class="col-sm-12">
                                <div>
                                    <h4 class="m-b-10"><strong>Transactions</strong></h4>
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Date</th>
                                                <th>Motif</th>
                                                <th>Crédit USD</th>
                                                <th>Débit USD</th>
                                                <th>Crédit CDF</th>
                                                <th>Débit CDF</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $total_credit_usd = 0; $total_debit_usd = 0; $total_credit_cdf = 0; $total_debit_cdf = 0; ?>
                                            @foreach($mvt as $doss)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{ date("Y-m-d", strtotime($doss->date_created)) }}</td>
                                                <td>{{ $doss->motif }}</td>
                                                <!-- Gestion des montants en USD -->
                                                @if($doss->type == 'int')
                                                <td><span class="badge bg-inverse-success"> + {{ number_format($doss->amount_usd) }} $</span></td>
                                                <td></td>
                                                <?php $total_credit_usd += $doss->amount_usd; ?>
                                                @elseif($doss->type == 'out')
                                                <td></td>
                                                <td><span class="badge bg-inverse-danger"> - {{ number_format($doss->amount_usd) }} $</span></td>
                                                <?php $total_debit_usd += $doss->amount_usd; ?>
                                                @endif
                                                <!-- Gestion des montants en CDF -->
                                                @if($doss->type == 'int')
                                                <td><span class="badge bg-inverse-info"> + {{ number_format($doss->amount_cdf) }} FC</span></td>
                                                <td></td>
                                                <?php $total_credit_cdf += $doss->amount_cdf; ?>
                                                @elseif($doss->type == 'out')
                                                <td></td>
                                                <td><span class="badge bg-inverse-warning"> - {{ number_format($doss->amount_cdf) }} FC</span></td>
                                                <?php $total_debit_cdf += $doss->amount_cdf; ?>
                                                @endif
                                            </tr>
                                            @endforeach
                                            <tr>
                                                <td colspan="3"><strong>Total</strong></td>
                                                <td>{{ number_format($total_credit_usd) }} $</td>
                                                <td>{{ number_format($total_debit_usd) }} $</td>
                                                <td>{{ number_format($total_credit_cdf) }} FC</td>
                                                <td>{{ number_format($total_debit_cdf) }} FC</td>
                                            </tr>

                                            <tr>
                                                 
                                                <td colspan="3"><strong>Solde</strong></td>
                                                <td>{{ number_format($total_credit_usd - $total_debit_usd) }} $</td>
                                                <td>{{ number_format( $total_credit_cdf-$total_debit_cdf) }} FC</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function imprimerPartie() {
            window.print();
        }
    </script>
</body>

</html>
