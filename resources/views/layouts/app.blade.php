<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- plugins:css -->
    <link rel="stylesheet" href="{{ asset("vendors/feather/feather.css")}} ">
    <link rel="stylesheet" href="{{ asset("vendors/ti-icons/css/themify-icons.css")}}">
    <link rel="stylesheet" href="vendors/css/vendor.bundle.base.css">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{ asset("vendors/datatables.net-bs4/dataTables.bootstrap4.css")}}">
    <link rel="stylesheet" href="{{ asset("vendors/ti-icons/css/themify-icons.css")}}">
    <link rel="stylesheet" type="text/css" href="{{ asset("js/select.dataTables.min.css")}}">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{ asset("css/vertical-layout-light/style.css")}}">
    <!-- endinject -->
    <link rel="shortcut icon" href="{{ asset("images/favicon.png")}}" />

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
</head>
<body>
    <div id="app" class="container-scroller">
        {{-- navbar --}}
        @if(Auth::check())
            <x-navbar />
            <div class="container-fluid page-body-wrapper">
                <!-- partial -->
                <x-sidebar/>
                <main class="main-panel">
                    <div class="content-wrapper">
                        @yield('content')
                    </div>
                </main>
            </div>
        @else
            <main class="container-fluid page-body-wrapper">
                @yield('content') 
            </main>
        @endif
        

    </div>
    <!-- plugins:js -->
    <script src="{{asset ("vendors/js/vendor.bundle.base.js")}}"></script>
    <!-- endinject -->
    <!-- Plugin js for this page -->
    <script src="{{asset("vendors/chart.js/Chart.min.js")}}"></script>
    <script src="{{asset("vendors/datatables.net/jquery.dataTables.js")}}"></script>
    <script src="{{asset("vendors/datatables.net-bs4/dataTables.bootstrap4.js")}}"></script>
    <script src="{{asset("js/dataTables.select.min.js")}}"></script>

    <!-- End plugin js for this page -->
    <!-- inject:js -->
    <script src="{{asset("js/off-canvas.js")}}"></script>
    <script src="{{asset("js/hoverable-collapse.js")}}"></script>
    <script src="{{asset("js/template.js")}}"></script>
    <script src="{{asset("js/settings.js")}}"></script>
    <script src="{{asset("js/todolist.js")}}"></script>
    <!-- endinject -->
    <!-- Custom js for this page-->
    <script src="{{asset("js/dashboard.js")}}"></script>
    <script src="{{asset("js/Chart.roundedBarCharts.js")}}"></script>
    <!-- End custom js for this page-->
</body>
</html>
