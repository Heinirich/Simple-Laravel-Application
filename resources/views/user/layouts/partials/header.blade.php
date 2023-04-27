<!-- Header -->
<header class="ec-main-header" id="header">
    <nav class="navbar navbar-static-top navbar-expand-lg">
        <!-- Sidebar toggle button -->
        <button id="sidebar-toggler" class="sidebar-toggle"></button>
        <!-- search form -->
        <div class="search-form d-lg-inline-block">
            <div class="input-group">
            <div class="container">

<div class="digital-clock" id="digital-clock"></div>
<span>TIME</span>
</div>


            </div>
            <div id="search-results-container">
                <ul id="search-results"></ul>
            </div>
        </div>

        <!-- navbar right -->
        <div class="navbar-right">
            <ul class="nav navbar-nav">
                <!-- User Account -->
                <li class="dropdown user-menu">
                    <button class="dropdown-toggle nav-link ec-drop" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="assets/img/user/user.png" class="user-image" alt="User Image" />
                    </button>
                    <ul class="dropdown-menu dropdown-menu-right ec-dropdown-menu">
                        <!-- User image -->
                        <li class="dropdown-header">
                            <img src="assets/img/user/user.png" class="img-circle" alt="User Image" />
                            <div class="d-inline-block">
                                {{auth()->user()->email}}<small class="pt-1">{{auth()->user()->name}}</small>
                            </div>
                        </li>
                        
                        
                       
                        <li class="">
                            <a href="{{route('user.getSettings')}}"> <i class="mdi mdi-settings-outline"></i>Setting </a>
                        </li>
                        <li class="dropdown-footer">
                            <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();"> <i class="mdi mdi-logout"></i> Log Out </a>
                        </li>
                    </ul>
                </li>
                
                    

                    

                    
            </ul>
        </div>
    </nav>
</header>
<script>
     let clock = document.getElementById("digital-clock");

      setInterval(() => {
        let date = new Date();
        clock.innerHTML = date.toLocaleTimeString();
      }, 1000);



</script>