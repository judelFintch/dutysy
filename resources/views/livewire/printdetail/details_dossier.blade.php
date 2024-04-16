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
    }
</style>

<div class="page-wrapper">
    <div class="content container-fluid">
        <div class="page-header">
            <div class="row align-items-center">
                <div class="col">
                    <h3 class="page-title">Details {{$dossier->plaque}} </h3>
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
        <div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div id="contenu" class="card-body">

                            <div class="row">
                                <div class="col-sm-6 m-b-20">
                                    <img src="{{asset('assets/img/new-castorms.jpg')}}" class="inv-logo" alt>
                                    <ul class="list-unstyled mb-0">
                                        <li><span>STE  LA MANE DE BRAVE SARL</span></li>
                                        <li> IDNAT: 05-H4901-N57665K</li>
                                        <li>Lshi/RCCM 15-B-3463, NIF:A1008059X</li>
                                      
                                    </ul>
                                </div>
                                <div class="col-sm-6 m-b-20">
                                    <div class="invoice-details">
                                        <h3 class="text-uppercase">#{{$dossier->plaque}}/ {{date('y-d')}}</h3>
                                        <ul class="list-unstyled">
                                            <li>Date : <span> {{date('Y-D-M')}}</span></li>
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
                                        <li><span></span></li>
                                        <li> {{$client->rccm}}</li>
                                        <li>{{$client->idnat}}</li>
                                        <li>{{$client->adresse}}</li>
                                        <li>{{$client->tel}}</li>
                                    </ul>
                                </div>
                            </div>
                            <h4 class="payslip-title">{{$dossier->plaque}}/ {{date('y-d')}}-{{$dossier->client->name}}</h4>
                            <div class="row">
                                <div class="col-sm-12">
                                    <div>
                                        <h4 class="m-b-10"><strong>Entrées</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                <?php $tot_out = 0;
                                                $tot_int = 0; ?>
                                                @foreach($mv_int as $mvt_int)
                                                <?php $tot_int += $mvt_int->montant ?>
                                                <tr>
                                                    <td>
                                                        <strong>Date</strong> <span class="float-end">{{ date("Y-m-d", strtotime($mvt_int->created_at)) }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="float-end">{{$mvt_int->motif}}</span>
                                                    </td>
                                                    <td>
                                                        <span class="float-end">{{$mvt_int->observation}}</span>
                                                    </td>
                                                    <td>
                                                        <strong> $ </strong> <span class="float-end">{{$mvt_int->amount_usd}}</span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><strong>$</strong> <span class="float-end"><strong>
                                                                {{$tot_int}}</strong></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <div>
                                        <h4 class="m-b-10"><strong>Sorties</strong></h4>
                                        <table class="table table-bordered">
                                            <tbody>
                                                @foreach($mv_out as $mvt_out)
                                                <?php $tot_out += $mvt_out->montant ?>
                                                <tr>
                                                    <td>
                                                        <strong>Date</strong> <span class="float-end">{{ date("Y-m-d", strtotime($mvt_out->created_at)) }}</span>
                                                    </td>
                                                    <td>
                                                        <span class="float-end">{{$mvt_out->motif}}</span>
                                                    </td>
                                                    <td>
                                                        <span class="float-end"> {{$mvt_out->observation}}</span>
                                                    </td>
                                                    <td>
                                                        <strong>$</strong> <span class="float-end">{{$mvt_out->amount_usd}}</span>
                                                    </td>
                                                </tr>
                                                @endforeach
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td><strong>$</strong> <span class="float-end"><strong>$
                                                                {{$tot_out}}</strong></span></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    
                                </div>
                            </div>
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