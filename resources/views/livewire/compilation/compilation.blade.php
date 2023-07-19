<div>
    <x-nav_left />
    <div class="page-wrapper">
        <div class="content container-fluid">
        <div class="row">
    
    <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
        <a href="">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-dollar"></i></span>
                    <div class="dash-widget-info">
                        <h3> {{ number_format($montantTotal)}}</h3>
                        <span>Total en caisse</span>
                    </div>
                </div>
            </div>
        </a>
    </div>
 
</div>
<table class="table table-striped custom-table datatable">
    <thead>
        <tr>
            <th>Plaque</th>
            <th>Solde</th>
        </tr>
    </thead>
    <tbody>
    @foreach ($compile as $doss)
        <tr>
            <td>{{ $doss->plaque }}</td>
            <td>{{ $doss->solde }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

</div>
