<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="images/hospitaaal.png" type="image/ico" />

    <title>Pakar Pencernaan Anak</title>

    <!-- Bootstrap -->
    <link href="{{ url('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    {{-- <link href="{{ url('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet"> --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    <!-- Bootstrap 4 CSS and JavaScript -->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <!-- jQuery JS -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <!-- Font Awesome 5 CSS -->
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <!-- Style CSS -->
    <link rel="stylesheet" href="css/style.css">
    <!-- NProgress -->
    <link href="{{ url('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ url('vendors/iCheck/skins/flat/green.') }}css" rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ url('vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }}" rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ url('vendors/jqvmap/dist/jqvmap.min.css') }}" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{ url('vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ url('build/css/custom.min.css') }}" rel="stylesheet">
</head>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css"
    integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />


<body class="nav-md ">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ url('dashboard') }}" class="site_title"><i class="fa-solid fa-hospital"
                                style="color: #ffffff;"></i> <span>Pakar Pencernaan Anak</span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="{{ url('images/farish.JPG') }}" alt="..." class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>Admin Farish</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    <div id="sidebar-menu" class="main_menu_side hidden-print main_menu ">

                        <div class="menu_section">
                            <h3>DASHBOARD</h3>
                            <ul class="nav side-menu">
                                <li><a href="{{ url('dashboard') }}"><i class="fa-solid fa-gauge"></i> Dashboard </a>
                                </li>
                            </ul>
                        </div>
                        <div class="menu_section">
                            <h3>MANAJEMEN DATA</h3>

                            <ul class="nav side-menu">
                                <li><a href="{{ route('pasien.index') }}"><i class="fa fa-wheelchair"></i> Pasien </a>
                                </li>
                                <li><a href="{{ route('gejala.index') }}"><i class="fa-solid fa-virus"></i> Gejala </a>
                                </li>
                                <li><a href="{{ route('penyakit.index') }}"><i class="fa-solid fa-disease"></i>
                                        Penyakit </a>
                                </li>
                                <li><a href="{{ route('aturan.index') }}"><i class="fa fa-info-circle"></i> Aturan </a>
                                </li>
                                <li><a href="{{ route('diagnosa.index') }}"><i class="fa fa-stethoscope"></i> Diagnosa
                                    </a></li>
                                <li><a href="{{ route('pakar.index') }}"><i class="fa fa-user-md"></i> Pakar </a></li>
                                <li><a href="{{ route('admin.index') }}"><i class="fa fa-user"></i> Admin </a></li>
                                <li><a href="{{ route('report.index') }}"><i class="fa fa-file"></i> Report </a></li>
                            </ul>
                        </div>

                    </div>
                    <!-- /sidebar menu -->

                    <!-- /menu footer buttons -->

                    <!-- /menu footer buttons -->
                </div>
            </div>

            <!-- top navigation -->
            <div class="top_nav">
                <div class="nav_menu">
                    <div class="nav toggle">
                        <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                    </div>
                    <nav class="nav navbar-nav">
                        <ul class=" navbar-right">
                            <li class="nav-item dropdown open" style="padding-left: 15px;">
                                <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true"
                                    id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ url('images/farish.JPG') }}" alt="">Farish
                                </a>
                                <div class="dropdown-menu dropdown-usermenu pull-right"
                                    aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="login.html"><i
                                            class="fa fa-sign-out pull-right"></i> Log Out</a>
                                </div>
                            </li>


                        </ul>
                    </nav>
                </div>
            </div>
            <!-- /top navigation -->

            @yield('content')

            <!-- jQuery -->
            <script src="{{ url('/vendors/jquery/dist/jquery.min.js') }}"></script>
            @stack('custom-scripts')
            <!-- Bootstrap -->
            <script src="{{ url('vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
            <!-- FastClick -->
            <script src="{{ url('vendors/fastclick/lib/fastclick.js') }}"></script>
            <!-- NProgress -->
            <script src="{{ url('vendors/nprogress/nprogress.js') }}"></script>
            <!-- Chart.js -->
            <script src="{{ url('vendors/Chart.js/dist/Chart.min.js') }}"></script>
            <!-- gauge.js -->
            <script src="{{ url('vendors/gauge.js/dist/gauge.min.js') }}"></script>
            <!-- bootstrap-progressbar -->
            <script src="{{ url('vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
            <!-- iCheck -->
            <script src="{{ url('vendors/iCheck/icheck.min.js') }}"></script>
            <!-- Skycons -->
            <script src="{{ url('vendors/skycons/skycons.js') }}"></script>
            <!-- Flot -->
            <script src="{{ url('vendors/Flot/jquery.flot.js') }}"></script>
            <script src="{{ url('vendors/Flot/jquery.flot.pie.js') }}"></script>
            <script src="{{ url('vendors/Flot/jquery.flot.time.js') }}"></script>
            <script src="{{ url('vendors/Flot/jquery.flot.stack.js') }}"></script>
            <script src="{{ url('vendors/Flot/jquery.flot.resize.js') }}"></script>
            <!-- Flot plugins -->
            <script src="{{ url('vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
            <script src="{{ url('vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
            <script src="{{ url('vendors/flot.curvedlines/curvedLines.js') }}"></script>
            <!-- DateJS -->
            <script src="{{ url('vendors/DateJS/build/date.js') }}"></script>
            <!-- JQVMap -->
            <script src="{{ url('vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
            <script src="{{ url('vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
            <script src="{{ url('vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
            <!-- bootstrap-daterangepicker -->
            <script src="{{ url('vendors/moment/min/moment.min.js') }}"></script>
            <script src="{{ url('vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/js/all.min.js"></script>
            <!-- Custom Theme Scripts -->
            <script src="{{ url('build/js/custom.min.js') }}"></script>

</body>

</html>
