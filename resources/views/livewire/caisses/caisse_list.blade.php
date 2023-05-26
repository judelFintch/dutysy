<div class="row">
    @foreach ($details_caisse as $res)
        <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
            <div class="card dash-widget">
                <div class="card-body">
                    <span class="dash-widget-icon"><i class="fa fa-dollar"></i></span>
                    <div class="dash-widget-info">
                        <h3>{{number_format($res->montant)}}</h3>
                        <span>{{$res->name_caisse}}</span>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>