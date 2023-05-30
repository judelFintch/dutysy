<style>
       

        @media print {
            @page {
                margin: 0;
            }
            body * {
                visibility: hidden;
            }
            #contenu, #contenu * {
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
                        <button onclick="imprimerPartie()" class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button>
                    </div>
                </div>
            </div>
        </div>
       <div>

        <div class="row">
            <div class="col-md-12" >
                <div class="card">
                    <div  id="contenu" class="card-body">
                       
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
                        <h4 class="payslip-title">{{$dossier->plaque}}/ {{date('y-d')}}</h4>
                       

</div>
</div>
</div>

<script>
    
    function imprimerPartie() {
            window.print();
        }
</script>