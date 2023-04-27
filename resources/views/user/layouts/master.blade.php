<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="description" content=".">

    <title>{{config('app.name')}}</title>

    <!-- GOOGLE FONTS -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@200;300;400;500;600;700;800&family=Poppins:wght@300;400;500;600;700;800;900&family=Roboto:wght@400;500;700;900&display=swap" rel="stylesheet">

    <link href="https://cdn.materialdesignicons.com/4.4.95/css/materialdesignicons.min.css" rel="stylesheet" />

    <!-- PLUGINS CSS STYLE -->
    <link href="{{asset('assets/plugins/daterangepicker/daterangepicker.css')}}" rel="stylesheet">
    <link href="{{asset('assets/plugins/simplebar/simplebar.css')}}" rel="stylesheet" />

    <!-- Ekka CSS -->
    <link id="ekka-css" href="{{asset('assets/css/ekka.css')}}" rel="stylesheet" />

    <!-- FAVICON -->
    <link href="{{asset('assets/img/favicon.png')}}" rel="shortcut icon" /> @livewireStyles

</head>

<body  class="ec-header-fixed ec-sidebar-fixed ec-sidebar-light ec-header-light" id="body">

    <!--  WRAPPER  -->
    <div class="wrapper">
        @if(inter_routeName() != 'login' || inter_routeName() != "register")
            @include('user.layouts.partials.sidebar')
        @endif
        
        @if(inter_routeName() != "login" || inter_routeName() != "register")
        <!--  PAGE WRAPPER -->
        <div class="ec-page-wrapper">
            @include('user.layouts.partials.header')
        @endif
            <!-- CONTENT WRAPPER -->
            @yield('content')
            <!-- End Content Wrapper -->
            @include('user.layouts.partials.footer')

        @if(inter_routeName() != "login" || inter_routeName() != "register")
        </div>
        @endif
        <!-- End Page Wrapper -->
    </div>
    <!-- End Wrapper -->

    <!-- Common Javascript -->
    <script src="{{asset('assets/plugins/jquery/jquery-3.5.1.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/plugins/simplebar/simplebar.min.js')}}"></script>
    <script src="{{asset('assets/plugins/jquery-zoom/jquery.zoom.min.js')}}"></script>
    <script src="{{asset('assets/plugins/slick/slick.min.js')}}"></script>

    <!-- Chart -->
    <script src="{{asset('assets/plugins/charts/Chart.min.js')}}"></script>
    <script src="{{asset('assets/js/chart.js')}}"></script>

    <!-- Google map chart -->
    <script src="{{asset('assets/plugins/charts/google-map-loader.js')}}"></script>
    <script src="{{asset('assets/plugins/charts/google-map.js')}}"></script>

    <!-- Date Range Picker -->
    <script src="{{asset('assets/plugins/daterangepicker/moment.min.js')}}"></script>
    <script src="{{asset('assets/plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/js/date-range.js')}}"></script>

    <!-- Option Switcher -->
    <script src="{{asset('assets/plugins/options-sidebar/optionswitcher.js')}}"></script>

    <!-- Ekka Custom -->
    <script src="{{asset('assets/js/ekka.js')}}"></script>
    @stack('scripts')
    @livewireScripts
</body>

</html>