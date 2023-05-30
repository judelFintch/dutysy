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
                        <button onclick="window.print()" class="btn btn-white"><i class="fa fa-print fa-lg"></i> Print</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div id="facture" class="card-body">
                        <h4 class="payslip-title">{{$dossier->plaque}}/ {{date('y-d')}}</h4>
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
                        <div class="row">
                            <div class="col-sm-6">
                                <div>
                                    <h4 class="m-b-10"><strong>Entree</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>
                                            <?php $tot_out=0; $tot_int=0;?>
                                            @foreach($mouvements as $mvt_int)
                                                @if($mvt_int->type="int")
                                                
                                                <?php $tot_int+=$mvt_int->montant?>
                                                <tr>
                                                    <td>
                                                        <strong>{{$mvt_int->motif}}</strong> <span
                                                            class="float-end">${{$mvt_int->montant}}</span>
                                                    </td>
                                                </tr>
                                                @endif
                                            @endforeach

                                            <tr>
                                                <td><strong>Total Earnings</strong> <span class="float-end"><strong>$
                                                            {{$tot_out}}</strong></span></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div>
                                    <h4 class="m-b-10"><strong>Sorties</strong></h4>
                                    <table class="table table-bordered">
                                        <tbody>

                                            @foreach($mouvements as $mvt_out)
                                            @if($mvt_out->type="out")
                                            <?php $tot_out+=$mvt_out->montant?>

                                            <tr>
                                                <td><strong>{{$mvt_out->motif}}</strong> <span class="float-end">$
                                                        {{$mvt_out->montant}}</span></td>
                                            </tr>
                                            @endif
                                            @endforeach
                                            <tr>
                                                <td><strong>Total Deductions</strong> <span class="float-end"><strong>$
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

<script>
    var imprimer = window.getElementById['facture'];
    window.print(imprimer);
</script>