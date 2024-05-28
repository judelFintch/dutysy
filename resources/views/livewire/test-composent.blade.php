<div>
<div class="header">
    <div class="header-left">
        <a href="{{route('dashboard')}}" class="logo">
            <img src="{{asset('assets/img/logo.png')}}" width="40" height="40" alt="">
        </a>
    </div>
    <a id="toggle_btn" href="javascript:void(0);">
        <span class="bar-icon">
            <span></span>
            <span></span>
            <span></span>
        </span>
    </a>
    <div class="page-title-box">
        <h3>{{ config('app.name', 'New Castoms') }}</h3>
    </div>

    <a id="mobile_btn" class="mobile_btn" href="#sidebar"><i class="fa fa-bars"></i></a>
    <ul class="nav user-menu">
        <li class="nav-item dropdown has-arrow flag-nav">
            <div class="dropdown-menu dropdown-menu-right">
                <a href="javascript:void(0);" class="dropdown-item">
                    <img src="{{asset('assets/img/flags/fr.png')}}" alt="" height="16"> French
                </a>
            </div>
        </li>

        <li class="nav-item dropdown">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <i class="fa fa-comment-o"></i> <span class="badge rounded-pill">8</span>
            </a>
            <div class="dropdown-menu notifications">
                <div class="topnav-dropdown-header">
                    <span class="notification-title">Messages</span>
                    <a href="javascript:void(0)" class="clear-noti"> Clear All </a>
                </div>
                <div class="noti-content">
                    <ul class="notification-list">
                    </ul>
                </div>
                <div class="topnav-dropdown-footer">
                    <a href="apps-chat">View all Messages</a>
                </div>
            </div>
        </li>
       

        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#">
                <span >  Taux : 1$ = {{$taux}} CDF</span>
            </a>
        </li>

        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img"><img src="assets/img/profiles/avatar-21.jpg" alt="">
                    <span class="status online"></span></span>
                <span> {{ Auth::user()->name }}</span>
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('profile.show') }}">Profile</a>
               
                <form method="POST" action="{{ route('logout') }}" x-data>
                    @csrf
                    <a class="dropdown-item" href="{{ route('logout') }}" @click.prevent="$root.submit();">
                        {{ __('Log Out') }}</a>
                </form>
            </div>
        </li>
    </ul>

</div>
</div>
