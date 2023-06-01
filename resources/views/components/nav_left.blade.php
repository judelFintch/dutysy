
<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>

                <li class="">
                    <a href="{{route('dossier.index')}}"><i class="la la-briefcase"></i> <span>Dossier</span></a>
                </li>
                <li class="">
                    <a href="{{route('caisse.index')}}"><i class="la la-dollar"></i> <span>Caisses</span></a>
                </li>
                <li class="">
                    <a href="{{route('client.index')}}"><i class="la la-user"></i> <span>Clients</span></a>
                </li>
                <li class="">
                    <a href="{{route('employer.index')}}"><i class="la la-users"></i> <span>Employés</span></a>
                </li>

                <li class="menu-title">
                    <span>Operations</span>
                </li>

                <li class="submenu">
                    <a href="#"><i class="la la-pie-chart"></i> <span> Reports </span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="" href="expense_reports"> Dossier </a></li>
                        <li><a class="" href="invoice_reports"> Rapport General</a></li>

                    </ul>
                </li>

                <li class="submenu">
                    <a href="#"><i class="la la-graduation-cap"></i> <span> Creation</span> <span
                            class="menu-arrow"></span></a>
                    <ul style="display: none;">
                        <li><a class="" href="{{route('destination.index')}}"> Destination</a></li>
                        <li><a class="" href="performance"> Secteur </a></li>
                        <li><a class="" href="performance_appraisal"> Fonction Employes </a></li>
                        <li><a class="" href="{{route('taux.index')}}">Gestion du taux  </a></li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
