<div>
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
                                            <li><span>STE NEW CASTORMS AGENCY</span></li>
                                            <li> IDNAT: 6-718-N390046R</li>
                                            <li>Lshi/RCCM 48-B470, NIF:A1705665C</li>
                                            <li>www.newcastomsagency.com</li>
                                            <li>www.info@newcastomsagency.com</li>
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
                                                <h5 class="mb-0"><strong>Beneficiaire </strong></h5>
                                            </li>
                                            <li><span>{{$dossier->beneficiaire}}</span></li>
                                            <li> </li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                    </div>
                                </div>
                                <h4 class="payslip-title">#/O/NCA/OP/{{$dossier->type}}/{{$id_ticket}}/{{date('d')}}/ {{date('y-m')}}</h4>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div>
                                            
                                            <table class="table table-bordered">
                                                <tbody>

                                                    <tr>
                                                        <td>
                                                            <strong>Motif</strong> <span
                                                                class="float-end"></span>
                                                        </td>
                                                        <td>
                                                            <strong></strong> <span
                                                                class="float-end">{{$dossier->motif}}</span>
                                                        </td>
                                                        <td>
                                                            <strong>Observation</strong> <span
                                                                class="float-end">{{$dossier->observation}}</span>
                                                        </td>
                                                        <td>
                                                            <strong>Motant</strong> <span
                                                                class="float-end">$ {{$dossier->montant}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><strong>Total</strong> <span
                                                                class="float-end"><strong>$  {{$dossier->montant}}
                                                                </strong></span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="row">
                                    <div class="col-sm-6">
                                        <p><strong>Comptabilite</strong> (Signature)</p>
                                        </div>
                                

                                    <div class="col-sm-4">
                                        <p><strong>Beneficiaire</strong> (Signature)</p>
                                        </div>
                                    </div>
                                </div>
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
                                        <img src="{{asset('assets/img/new-castorms.jpg')}}" class="inv-logo" alt>
                                        <ul class="list-unstyled mb-0">
                                            <li><span>STE NEW CASTORMS AGENCY</span></li>
                                            <li> IDNAT: 6-718-N390046R</li>
                                            <li>Lshi/RCCM 48-B470, NIF:A1705665C</li>
                                            <li>www.newcastomsagency.com</li>
                                            <li>www.info@newcastomsagency.com</li>
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
                                                <h5 class="mb-0"><strong>Beneficiaire </strong></h5>
                                            </li>
                                            <li><span>{{$dossier->beneficiaire}}</span></li>
                                            <li> </li>
                                            <li></li>
                                            <li></li>
                                            <li></li>
                                        </ul>
                                    </div>
                                </div>
                                <h4 class="payslip-title">#/Copy/NCA/OP/{{$dossier->type}}/{{$id_ticket}}/{{date('d')}}/ {{date('y-m')}}</h4>
                                <div class="row">
                                    <div class="col-sm-8">
                                        <div>
                                            
                                            <table class="table table-bordered">
                                                <tbody>

                                                    <tr>
                                                        <td>
                                                            <strong>Motif</strong> <span
                                                                class="float-end"></span>
                                                        </td>
                                                        <td>
                                                            <strong></strong> <span
                                                                class="float-end">{{$dossier->motif}}</span>
                                                        </td>
                                                        <td>
                                                            <strong>Observation</strong> <span
                                                                class="float-end">{{$dossier->observation}}</span>
                                                        </td>
                                                        <td>
                                                            <strong>Motant</strong> <span
                                                                class="float-end">$ {{$dossier->montant}}</span>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td></td>
                                                        <td></td>
                                                        <td></td>
                                                        <td><strong>Total</strong> <span
                                                                class="float-end"><strong>$  {{$dossier->montant}}
                                                                </strong></span></td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>

                                    <div class="row">
                                    <div class="col-sm-6">
                                        <p><strong>Comptabilite</strong> (Signature)</p>
                                        </div>
                                

                                    <div class="col-sm-4">
                                        <p><strong>Beneficiaire</strong> (Signature)</p>
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
</div>

<script>
    function imprimerPartie() {
        window.print();
    }
</script>
</div>