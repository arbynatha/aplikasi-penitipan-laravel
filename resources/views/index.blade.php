<!doctype html>
<html lang="id">

<head>
    {{-- <!-- Required meta tags --> --}}
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <!-- Bootstrap CSS --> --}}
    <link href="{{ asset('assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fonts/circular-std/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/libs/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fonts/fontawesome/css/fontawesome-all.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/charts/chartist-bundle/chartist.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/charts/morris-bundle/morris.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/vendor/charts/c3charts/c3.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendor/fonts/flag-icon-css/flag-icon.min.css') }}" rel="stylesheet">

    {{-- <!-- plugins --> --}}
    <link href="{{ asset('asset/css/plugins/font-awesome.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('asset/css/plugins/animate.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('asset/css/plugins/nouislider.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('asset/css/plugins/select2.min.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('asset/css/plugins/ionrangeslider/ion.rangeSlider.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('asset/css/plugins/ionrangeslider/ion.rangeSlider.skinFlat.css') }}" type="text/css"
        rel="stylesheet">
    <link href="{{ asset('asset/css/plugins/bootstrap-material-datetimepicker.css') }}" type="text/css"
        rel="stylesheet">
    <link href="{{ asset('asset/css/plugins/simple-line-icons.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('asset/css/plugins/mediaelementplayer.css') }}" type="text/css" rel="stylesheet">
    <link href="{{ asset('asset/css/style.css') }}" type="text/css" rel="stylesheet">

    <!-- end: Css -->
    <link rel="shortcut icon" href="asset/img/logo.png">

    <title>Aplikasi-Penitipan | @yield('title')</title>
</head>

<body>
    {{-- Main wrapper --}}
    <div class="dashboard-main-wrapper">

        {{-- navbar --}}
        <div class="dashboard-header">
            <nav class="navbar navbar-expand-lg bg-white fixed-top">
                <a class="navbar-brand" href="index.html">( Nama Perusahaan )</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse " id="navbarSupportedContent">
                    <ul class="navbar-nav ml-auto navbar-right-top">
                        {{-- <li class="nav-item">
                            <div id="custom-search" class="top-search-bar">
                                <input class="form-control" type="text" placeholder="Search..">
                            </div>
                        </li> --}}
                        <li class="nav-item dropdown nav-user">
                            <a class="nav-link nav-user-img" href="#" id="navbarDropdownMenuLink2"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img
                                    src="assets/images/avatar-1.jpg" alt=""
                                    class="user-avatar-md rounded-circle"></a>
                            <div class="dropdown-menu dropdown-menu-right nav-user-dropdown"
                                aria-labelledby="navbarDropdownMenuLink2">
                                <div class="nav-user-info">
                                    <h5 class="mb-0 text-white nav-user-name">John Abraham </h5>
                                    <span class="status"></span><span class="ml-2">Available</span>
                                </div>
                                
                                @if (Auth::check() && Auth::user()->role_users_id == 1)
                                <a class="dropdown-item" href="#"><i class="fas fa-user mr-2"></i>Account</a>
                                @endif

                                <a class="dropdown-item" href="{{ url('/logout') }}"><i
                                        class="fas fa-power-off mr-2"></i>Logout</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        {{-- end navbar --}}

        {{-- left sidebar --}}
        <div class="nav-left-sidebar sidebar-dark">
            <div class="menu-list">
                <nav class="navbar navbar-expand-lg navbar-light">
                    <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav flex-column">
                            <li class="nav-divider">
                                Menu
                            </li>

                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('index') }}">Dashboard</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('daftar') }}">Daftar Laporan</a>
                            </li>
                            @if (Auth::check() && Auth::user()->role_users_id == 1)
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin') }}">Menu Admin</a>
                                </li>
                            @endif
                </nav>
            </div>
        </div>
        {{-- end left sidebar --}}

        {{-- wrapper --}}
        <div class="dashboard-wrapper">
            <div class="dashboard-ecommerce">
                <div class="container-fluid dashboard-content ">
                    {{-- page header --}}
                    <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h2 class="pageheader-title">Aplikasi Penitipan Helm</h2>
                                <p class="pageheader-text">Nulla euismod urna eros, sit amet scelerisque torton lectus
                                    vel mauris facilisis faucibus at enim quis massa lobortis rutrum.</p>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="#"
                                                    class="breadcrumb-link">@yield('strip')</a></li>
                                            <li class="breadcrumb-item active" aria-current="page"></li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end pageheader --}}

                    <div class="ecommerce-widget">

                        <div class="row">
                            @yield('konten')
                        </div>
                    </div>
                </div>
            </div>

        </div>
        {{-- end wrapper --}}
    </div>
    {{-- end main wrapper --}}

    {{-- opsi javascript --}}
    {{-- <!-- jquery 3.3.1 --> --}}
    <script src="assets/vendor/jquery/jquery-3.3.1.min.js"></script>
    {{-- <!-- bootstap bundle js --> --}}
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.js"></script>
    {{-- <!-- slimscroll js --> --}}
    <script src="assets/vendor/slimscroll/jquery.slimscroll.js"></script>
    {{-- <!-- main js --> --}}
    <script src="assets/libs/js/main-js.js"></script>
    {{-- <!-- chart chartist js --> --}}
    <script src="assets/vendor/charts/chartist-bundle/chartist.min.js"></script>
    {{-- <!-- sparkline js --> --}}
    <script src="assets/vendor/charts/sparkline/jquery.sparkline.js"></script>
    {{-- <!-- morris js --> --}}
    <script src="assets/vendor/charts/morris-bundle/raphael.min.js"></script>
    <script src="assets/vendor/charts/morris-bundle/morris.js"></script>
    {{-- <!-- chart c3 js --> --}}
    <script src="assets/vendor/charts/c3charts/c3.min.js"></script>
    <script src="assets/vendor/charts/c3charts/d3-5.4.0.min.js"></script>
    <script src="assets/vendor/charts/c3charts/C3chartjs.js"></script>
    <script src="assets/libs/js/dashboard-ecommerce.js"></script>
</body>

</html>
