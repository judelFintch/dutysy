bonjour
<div class="sidebar" id="sidebar">
            <div class="sidebar-inner slimscroll">
                <div id="sidebar-menu" class="sidebar-menu">
                    <ul>
                       
                        <li class="">
                            <a href="{{route('dossier.index')}}"><i class="la la-briefcase"></i> <span>Dossier</span></a>
                        </li>
                      
    
                        <li class="">
                            <a href="{{route('client.index')}}"><i class="la la-user"></i> <span>Clients</span></a>
                        </li>
                        <li class="">
                            <a href="{{route('employer.index')}}"><i class="la la-users"></i> <span>Employés</span></a>
                        </li>

                        <li class="menu-title">
                            <span>Operation</span>
                        </li>
                        
                        <li class="submenu">
                            <a href="{{route('rapport.index')}}"><i class="la la-pie-chart"></i> <span> Reportsj </span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href=""> Expense Report </a></li>
                                <li><a class="" href="invoice_reports"> Invoice Report </a></li>
                                
                            </ul>
                        </li>
                       
                        <li class="submenu">
                            <a href="#"><i class="la la-graduation-cap"></i> <span> Creation</span> <span
                                    class="menu-arrow"></span></a>
                            <ul style="display: none;">
                                <li><a class="" href="{{route('destination.index')}}"> Destination</a></li>
                                <li><a class="" href="performance"> Secteur </a></li>
                                <li><a class="" href="performance_appraisal"> Fonction Employes </a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
  