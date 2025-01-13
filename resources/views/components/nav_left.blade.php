<div class="sidebar" id="sidebar">
    <div class="sidebar-inner slimscroll">
        <div id="sidebar-menu" class="sidebar-menu">
            <ul>
                <!-- Menu principal -->
                <li>
                    <a href="{{ route('dossier.index') }}">
                        <i class="la la-briefcase"></i>
                        <span>Dossier</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('dossier.index') }}">
                        <i class="la la-briefcase"></i>
                        <span>Dossier Cloturé</span>
                    </a>
                </li>



                <li>
                    <a href="{{ route('caisse.index') }}">
                        <i class="la la-dollar"></i>
                        <span>Caisses</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('client.index') }}">
                        <i class="la la-user"></i>
                        <span>Clients</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('employer.index') }}">
                        <i class="la la-users"></i>
                        <span>Employés</span>
                    </a>
                </li>
                <!-- Nouveau menu : Situation Banque -->
                <li>
                    <a href="{{ route('banque.situation') }}">
                        <i class="la la-credit-card"></i>
                        <span>Banque</span>
                    </a>
                </li>

                <!-- Section des opérations -->
                <li class="menu-title">
                    <span>Opérations</span>
                </li>

                <li class="submenu">
                    <a href="#">
                        <i class="la la-pie-chart"></i>
                        <span> Rapports </span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="{{ route('rapport.index') }}">Rapport</a></li>
                        <li><a href="invoice_reports">Rapport Général</a></li>
                    </ul>
                </li>

                <li class="submenu">
                    <a href="#">
                        <i class="la la-graduation-cap"></i>
                        <span>Création</span>
                        <span class="menu-arrow"></span>
                    </a>
                    <ul style="display: none;">
                        <li><a href="{{ route('destination.index') }}">Destination</a></li>
                        <li><a href="performance">Secteur</a></li>
                    </ul>
                </li>

                <!-- Section autres éléments -->
                <li>
                    <a href="{{ route('trash.index') }}">
                        <i class="la la-trash"></i>
                        <span>Corbeille</span>
                    </a>
                </li>

                <li>
                    <a href="{{ route('archives.index') }}">
                        <i class="la la-archive"></i>
                        <span>Archives</span>
                    </a>
                </li>

            </ul>
        </div>
    </div>
</div>
