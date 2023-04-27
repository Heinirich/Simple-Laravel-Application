<!-- LEFT MAIN SIDEBAR -->
<div class="ec-left-sidebar ec-bg-sidebar">
    <div id="sidebar" class="sidebar ec-sidebar-footer">

        <div class="ec-brand">
            <a href="{{route('user.dashboard')}}" title="{{config('app.name')}}">
                <img class="ec-brand-icon" src="{{asset('assets/img/logo/ec-site-logo.png')}}" alt="" />
                <span class="ec-brand-name text-truncate">{{config('app.name')}}</span>
            </a>
        </div>

        <!-- begin sidebar scrollbar -->
        <div class="ec-navigation" data-simplebar>
            <!-- sidebar menu -->
            <ul class="nav sidebar-inner" id="sidebar-menu">
                <!-- Dashboard -->
                <li class="active">
                    <a class="sidenav-item-link" href="{{route('user.dashboard')}}">
                        <i class="mdi mdi-view-dashboard-outline"></i>
                        <span class="nav-text">Dashboard</span>
                    </a>
                    <hr>
                </li>


                <!-- Products -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="{{route('user.products')}}">
                        <i class="mdi mdi-palette-advanced"></i>
                        <span class="nav-text">Products</span>
                    </a>
                </li>
    
                <!-- Authentication -->
                <li class="has-sub">
                    <a class="sidenav-item-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="mdi mdi-login"></i>
                        <span class="nav-text">Logout</span>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>

                </li>


            </ul>
        </div>
    </div>
</div>