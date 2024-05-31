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
                                <h3>{{ isset($solde_caisse) ? number_format($solde_caisse->amount_usd) : 0 }} $</h3>
                                    <span> </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col-md-6 col-sm-6 col-lg-6 col-xl-3">
                    <a href="">
                        <div class="card dash-widget">
                        <div class="card-body">
                                <span class="dash-widget-icon"><i class="fa fa-money"></i></span>
                                <div class="dash-widget-info">
                                <h3>{{ isset($solde_caisse) && isset($solde_caisse->amount_cdf) ? number_format($solde_caisse->amount_cdf) : 0 }} CDF</h3>
                                    <span> </span>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>