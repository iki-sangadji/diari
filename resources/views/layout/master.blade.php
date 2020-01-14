<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Dashboard</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('CoolAdmin-master/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('CoolAdmin-master/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('CoolAdmin-master/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('CoolAdmin-master/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('CoolAdmin-master/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('CoolAdmin-master/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('CoolAdmin-master/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('CoolAdmin-master/vendor/wow/animate.css" rel="stylesheet')}}" media="all">
    <link href="{{asset('CoolAdmin-master/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('CoolAdmin-master/vendor/slick/slick.css" rel="stylesheet')}}" media="all">
    <link href="{{asset('CoolAdmin-master/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('CoolAdmin-master/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('CoolAdmin-master/css/theme.css')}}" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="images/icon/logo.png" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="list-unstyled navbar__list">
                    
                        @guest
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-copy"></i>Gejala</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: none;">
                                    <li>
                                        <a href="{{route('formTambahGejala')}}">
                                        <i class="fa fa-plus-square"></i>Tambah Gejala</a>
                                    </li>
                                    <li>
                                        <a href="{{route("tampilDaftarGejala")}}">
                                        <i class="fas fa-table"></i>Daftar Gejala</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-copy"></i>Penyakit</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: none;">
                                    <li>
                                        <a href="{{route('formTambahPenyakit')}}">
                                        <i class="fa fa-plus-square"></i>Tambah Penyakit</a>
                                    </li>
                                    <li>
                                        <a href="{{route("daftarPenyakit")}}">
                                        <i class="fas fa-table"></i>Daftar Penyakit</a>
                                    </li>
                                    
                                </ul>
                            </li>
                        @endguest
                        <li>
                            <a href="{{route("pertanyaanPertama")}}">
                                <i class="far fa-check-square"></i>Mulai diagnosa</a>
                        </li>
                        
                        
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="images/icon/logo.png" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                        <li>
                            <a href="{{route("pertanyaanPertama")}}">
                                <i class="far fa-check-square"></i>Mulai diagnosa</a>
                        </li>
                        @if(Auth::guest())
                            <li>
                                <a href="{{route('login')}}">
                                <i class="fa fa-user"></i>Admin</a>
                            </li>
                            
                        @else
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-copy"></i>Gejala</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: none;">
                                    <li>
                                        <a href="{{route('formTambahGejala')}}">
                                        <i class="fa fa-plus-square"></i>Tambah Gejala</a>
                                    </li>
                                    <li>
                                        <a href="{{route("tampilDaftarGejala")}}">
                                        <i class="fas fa-table"></i>Daftar Gejala</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li class="has-sub">
                                <a class="js-arrow" href="#">
                                    <i class="fas fa-copy"></i>Penyakit</a>
                                <ul class="list-unstyled navbar__sub-list js-sub-list" style="display: none;">
                                    <li>
                                        <a href="{{route('formTambahPenyakit')}}">
                                        <i class="fa fa-plus-square"></i>Tambah Penyakit</a>
                                    </li>
                                    <li>
                                        <a href="{{route("daftarPenyakit")}}">
                                        <i class="fas fa-table"></i>Daftar Penyakit</a>
                                    </li>
                                    
                                </ul>
                            </li>
                            <li>
                                <a href="{{ route('logout') }}" onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        @endif
                        
                        
                        
                    </ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                            
                            <div class="header-button">
                                
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- HEADER DESKTOP-->

            <!-- MAIN CONTENT-->
            <div class="main-content">
                 <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="row">
                            @yield('content')
                        </div>
                    </div>
                </div>    
                
            </div>
            <!-- END MAIN CONTENT-->
            <!-- END PAGE CONTAINER-->
        </div>

    </div>

   <!-- Jquery JS-->
    <script src="{{asset('CoolAdmin-master/vendor/jquery-3.2.1.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('CoolAdmin-master/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('CoolAdmin-master/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('CoolAdmin-master/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('CoolAdmin-master/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('CoolAdmin-master/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('CoolAdmin-master/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('CoolAdmin-master/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('CoolAdmin-master/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('CoolAdmin-master/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('CoolAdmin-master/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('CoolAdmin-master/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('CoolAdmin-master/vendor/select2/select2.min.js')}}">
    </script>

    <!-- Main JS-->
    <script src="{{asset('CoolAdmin-master/js/main.js')}}"></script>
     <script src="{{ asset('js/app.js') }}"></script>

</body>

</html>
<!-- end document-->


