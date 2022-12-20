<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    {{-- <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" /> --}}
    <title>Light Bootstrap Dashboard - Free Bootstrap 4 Admin Dashboard by Creative Tim</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href={{ asset('/assets/css/bootstrap.min.css') }} rel="stylesheet" />
    <link href={{ asset('/assets/css/light-bootstrap-dashboard.css?v=2.0.0 ') }} rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href={{ asset('/assets/css/demo.css') }} rel="stylesheet" />
    {{-- <link href={{ asset('/assets/css/bootstrap5.min.css') }} rel="stylesheet" > --}}

    {{-- jquery --}}
    <script src={{ asset('/assets/js/core/jquery.3.2.1.min.js') }} type="text/javascript"></script>

</head>

<body>
    <div class="wrapper">
        <div class="sidebar" data-image={{ asset('/assets/img/sidebar-6.png') }} data-color="purple">
            <!--
        Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

        Tip 2: you can also add an image using data-image tag
    -->
            <div class="sidebar-wrapper">
                <div class="logo">

                    <a href="javascript:;" class="simple-text">
                        SIPTIHAT POLRI
                    </a>
                </div>
                <ul class="nav">
                    @if (Auth::user()->id_role == 2 || Auth::user()->id_role == 5 )
                        <li class="nav-item"{{request()->is('/disporsisi') ? 'active' : ''}}>
                            <a class="nav-link" href="{{ url('/daftar_disporsisi') }}">
                                <i class="nc-icon nc-icon nc-paper-2"></i>
                                <p>Disporsisi</p>
                            </a>
                        </li>
                        <li class="nav-item{{request()->is('/kasus') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ url('/kasus') }}">
                                <i class="nc-icon nc-icon nc-paper-2"></i>
                                <p>Kasus</p>
                            </a>
                        </li>
                    @elseif (Auth::user()->id_role == 1)
                        <li class="nav-item{{request()->is('/pra_kasus') ? 'active' : ''}}">
                            <a class="nav-link" href="{{ route('pra_kasus.index') }}">
                                <i class="nc-icon nc-icon nc-paper-2"></i>
                                <p>Pra Kasus</p>
                            </a>
                        </li>
                    @elseif (Auth::user()->id_role == 4)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pelaporanKasus.index') }}">
                                <i class="nc-icon nc-icon nc-paper-2"></i>
                                <p>Pelaporan Kasus</p>
                            </a>
                        </li>
                    @elseif (Auth::user()->id_role == 3)
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('pejabatKasus.index') }}">
                                <i class="nc-icon nc-icon nc-paper-2"></i>
                                <p>Lembaga Kepolisian</p>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="{{ url('/daftar_disporsisi') }}">
                                <i class="nc-icon nc-icon nc-paper-2"></i>
                                <p>Disporsisi</p>
                            </a>
                        </li> -->
                    @endif

                    <li>
                        <a class="nav-link" href="/kasus">
                            <i class="nc-icon nc-bell-55"></i>
                            <p>User</p>
                        </a>
                    </li>

                    {{-- <li class="nav-item active active-pro">
                        <a class="nav-link active" href="javascript:;">
                            <i class="nc-icon nc-alien-33"></i>
                            <p>Upgrade plan</p>
                        </a>
                    </li> --}}
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    {{-- <a class="navbar-brand" href="#pablo">Template</a> --}}
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button"
                        data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false"
                        aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-palette"></i>
                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                            <li class="dropdown nav-item">
                                <a href="#" class="dropdown-toggle nav-link" data-toggle="dropdown">
                                    <i class="nc-icon nc-planet"></i>
                                    <span class="notification">5</span>
                                    <span class="d-lg-none">Notification</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <a class="dropdown-item" href="#">Notification 1</a>
                                    <a class="dropdown-item" href="#">Notification 2</a>
                                    <a class="dropdown-item" href="#">Notification 3</a>
                                    <a class="dropdown-item" href="#">Notification 4</a>
                                    <a class="dropdown-item" href="#">Another notification</a>
                                </ul>
                            </li>
                            <li class="nav-item">
                                <a href="#" class="nav-link">
                                    <i class="nc-icon nc-zoom-split"></i>
                                    <span class="d-lg-block">&nbsp;Search</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="#pablo">
                                    <span class="no-icon">Account</span>
                                </a>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="http://example.com"
                                    id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    <span class="no-icon">Dropdown</span>
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Action</a>
                                    <a class="dropdown-item" href="#">Another action</a>
                                    <a class="dropdown-item" href="#">Something</a>
                                    <a class="dropdown-item" href="#">Something else here</a>
                                    <div class="divider"></div>
                                    <a class="dropdown-item" href="#">Separated link</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" id="navbarDropdown"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                    role="button">
                                    {{ Auth::user()->name }}
                                </a>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdownMenu">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            @yield('content')
            {{-- <footer class="footer">
                <div class="container-fluid">
                    <nav>
                        <ul class="footer-menu">
                            <li>
                                <a href="#">
                                    Home
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Company
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Portfolio
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    Blog
                                </a>
                            </li>
                        </ul>
                        <p class="copyright text-center">
                            ©
                            <script>
                                document.write(new Date().getFullYear())
                            </script>
                            <a href="http://www.creative-tim.com">Creative Tim</a>, made with love for a better web
                        </p>
                    </nav>
                </div>
            </footer> --}}
        </div>
    </div>
    <!--   -->
    <!-- <div class="fixed-plugin">
    <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
            <i class="fa fa-cog fa-2x"> </i>
        </a>

        <ul class="dropdown-menu">
   <li class="header-title"> Sidebar Style</li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger">
                    <p>Background Image</p>
                    <label class="switch">
                        <input type="checkbox" data-toggle="switch" checked="" data-on-color="primary" data-off-color="primary"><span class="toggle"></span>
                    </label>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="adjustments-line">
                <a href="javascript:void(0)" class="switch-trigger background-color">
                    <p>Filters</p>
                    <div class="pull-right">
                        <span class="badge filter badge-black" data-color="black"></span>
                        <span class="badge filter badge-azure" data-color="azure"></span>
                        <span class="badge filter badge-green" data-color="green"></span>
                        <span class="badge filter badge-orange" data-color="orange"></span>
                        <span class="badge filter badge-red" data-color="red"></span>
                        <span class="badge filter badge-purple active" data-color="purple"></span>
                    </div>
                    <div class="clearfix"></div>
                </a>
            </li>
            <li class="header-title">Sidebar Images</li>

            <li class="active">
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-1.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-3.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="..//assets/img/sidebar-4.jpg" alt="" />
                </a>
            </li>
            <li>
                <a class="img-holder switch-trigger" href="javascript:void(0)">
                    <img src="../assets/img/sidebar-5.jpg" alt="" />
                </a>
            </li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard" target="_blank" class="btn btn-info btn-block btn-fill">Download, it's free!</a>
                </div>
            </li>

            <li class="header-title pro-title text-center">Want more components?</li>

            <li class="button-container">
                <div class="">
                    <a href="http://www.creative-tim.com/product/light-bootstrap-dashboard-pro" target="_blank" class="btn btn-warning btn-block btn-fill">Get The PRO Version!</a>
                </div>
            </li>

            <li class="header-title" id="sharrreTitle">Thank you for sharing!</li>

            <li class="button-container">
    <button id="twitter" class="btn btn-social btn-outline btn-twitter btn-round sharrre"><i class="fa fa-twitter"></i> · 256</button>
                <button id="facebook" class="btn btn-social btn-outline btn-facebook btn-round sharrre"><i class="fa fa-facebook-square"></i> · 426</button>
            </li>
        </ul>
    </div>
</div>
 -->
</body>

<!--   Core JS Files   -->

<script src={{ asset('/assets/js/core/popper.min.js') }} type="text/javascript"></script>
<script src={{ asset('/assets/js/core/bootstrap.min.js') }} type="text/javascript"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src={{ asset('/assets/js/plugins/bootstrap-switch.js') }}></script>
<!--  Chartist Plugin  -->
<script src={{ asset('/assets/js/plugins/chartist.min.js') }}></script>
<!--  Notifications Plugin    -->
<script src={{ asset('/assets/js/plugins/bootstrap-notify.js') }}></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src={{ asset('/assets/js/light-bootstrap-dashboard.js?v=2.0.0') }} type="text/javascript"></script>
<!-- Light Bootstrap Dashboard DEMO methods, don't include it in your project! -->
<script src={{ asset('/assets/js/demo.js') }}></script>

</html>
