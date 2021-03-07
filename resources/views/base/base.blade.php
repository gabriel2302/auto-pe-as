<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>AutoPeças - Pedrin</title>

    <!-- ========== COMMON STYLES ========== -->
    <link rel="stylesheet" href="./public/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="./public/css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="./public/css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="./public/css/lobipanel/lobipanel.min.css" media="screen">

    <!-- ========== PAGE STYLES ========== -->
    <link rel="stylesheet" href="./public/css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
    <link rel="stylesheet" href="./public/css/toastr/toastr.min.css" media="screen">
    <link rel="stylesheet" href="./public/css/icheck/skins/line/blue.css">
    <link rel="stylesheet" href="./public/css/icheck/skins/line/red.css">
    <link rel="stylesheet" href="./public/css/icheck/skins/line/green.css">
    <link rel="stylesheet" href="./public/css/bootstrap-tour/bootstrap-tour.css">

    <!-- ========== THEME CSS ========== -->
    <link rel="stylesheet" href="./public/css/main.css" media="screen">

    <!-- ========== MODERNIZR ========== -->
    <script src="./public/js/modernizr/modernizr.min.js"></script>
</head>

<body class="top-navbar-fixed">
    <div class="main-wrapper">

        <!-- ========== TOP NAVBAR ========== -->
        <nav class="navbar top-navbar bg-white box-shadow">
            <div class="container-fluid">
                <div class="row">
                    <div class="navbar-header no-padding">
                        <a class="navbar-brand" href="index.html">
                            <img src="../images/logo-dark.svg" alt="Pedrin AutoPeças" class="logo">
                        </a>
                        <span class="small-nav-handle hidden-sm hidden-xs"><i class="fa fa-outdent"></i></span>
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse-1" aria-expanded="false">
                            <span class="sr-only">Toggle navigation</span>
                            <i class="fa fa-ellipsis-v"></i>
                        </button>
                        <button type="button" class="navbar-toggle mobile-nav-toggle">
                            <i class="fa fa-bars"></i>
                        </button>
                    </div>
                    <!-- /.navbar-header -->

                    <div class="collapse navbar-collapse" id="navbar-collapse-1">
                        <ul class="nav navbar-nav" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li class="hidden-sm hidden-xs"><a href="#" class="user-info-handle"><i class="fa fa-user"></i></a></li>
                            <li class="hidden-sm hidden-xs"><a href="#" class="full-screen-handle"><i class="fa fa-arrows-alt"></i></a></li>

                        </ul>
                        <!-- /.nav navbar-nav -->

                        <ul class="nav navbar-nav navbar-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li class="dropdown tour-two">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Pedrin<span class="caret"></span></a>
                                <ul class="dropdown-menu profile-dropdown">
                                    <li class="profile-menu bg-gray">
                                        <div class="">
                                            <img src="http://placehold.it/60/c2c2c2?text=User" alt="John Doe" class="img-circle profile-img">
                                            <div class="profile-name">
                                                <h6>Pedrin </h6>
                                                <a href="#">View Profile</a>
                                            </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </li>
                                    <li><a href="#"><i class="fa fa-cog"></i> Configurações</a></li>
                                    <li><a href="#"><i class="fa fa-sliders"></i> Account Details</a></li>
                                    <li role="separator" class="divider"></li>
                                    <li><a href="#" class="color-danger text-center"><i class="fa fa-sign-out"></i> Logout</a></li>
                                </ul>
                            </li>
                            <!-- /.dropdown -->
                        </ul>
                        <!-- /.nav navbar-nav navbar-right -->
                    </div>
                    <!-- /.navbar-collapse -->
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </nav>

        <!-- ========== WRAPPER FOR BOTH SIDEBARS & MAIN CONTENT ========== -->
        <div class="content-wrapper">
            <div class="content-container">

                <!-- ========== LEFT SIDEBAR ========== -->
                <div class="left-sidebar fixed-sidebar bg-black-300 box-shadow tour-three">
                    <div class="sidebar-content">
                        <div class="user-info closed">
                            <img src="http://placehold.it/90/c2c2c2?text=User" alt="John Doe" class="img-circle profile-img">
                            <h6 class="title">Pedrin Delas</h6>
                            <small class="info">PHP Developer</small>
                        </div>
                        <!-- /.user-info -->

                        <div class="sidebar-nav">
                            <ul class="side-nav color-gray">
                                <li class="nav-header">
                                    <span class="">Cadastros</span>
                                </li>
                                <li class="has-children">
                                    <a href="#"><i class="fa fa-dashboard"></i> <span>Autopeças</span> <i class="fa fa-angle-right arrow"></i></a>
                                    <ul class="child-nav">
                                        <li class="active"><a href="#"><i class="fa fa-bolt"></i> <span>Produtos</span></a></li>
                                        <li><a href="#"><i class="fa fa-bookmark"></i> <span>Clientes</span></a></li>
                                        <li><a href="#"><i class="fa fa-dashboard"></i> <span>Funcionários</span></a></li>
                                    </ul>
                                </li>

                                <li class="nav-header">
                                    <span class="">Foda se</span>
                                </li>
                                <li class="has-children">
                                    <a href="#"><i class="fa fa-file-text"></i> <span>A</span> <i class="fa fa-angle-right arrow"></i></a>
                                    <ul class="child-nav">
                                        <li><a href="#"><i class="fa fa-lock"></i> <span>B</span></a></li>
                                        <li><a href="#"><i class="fa fa-thumb-tack"></i> <span>C</span></a></li>
                                        <li><a href="#"><i class="fa fa-unlock"></i> <span>D</span></a></li>
                                        <li><a href="#"><i class="fa fa-sign-in"></i> <span>E</span></a></li>
                                    </ul>
                                </li>

                            </ul>

                        </div>
                        <!-- /.sidebar-nav -->
                    </div>
                    <!-- /.sidebar-content -->
                </div>
                <!-- /.left-sidebar -->

                <div class="main-page">
                    <div class="container-fluid">

                        @yield('conteudo')

                    </div>
                </div>

                <div class="right-sidebar bg-white fixed-sidebar">
                    <div class="sidebar-content">
                        <div class="container-fluid">
                            <div class="row">
                                <div class="col-md-12">
                                    <h4>Useful Sidebar <i class="fa fa-times close-icon"></i></h4>
                                    <p>Code for help is added within the main page. Check for code below the example.</p>
                                    <p>You can use this sidebar to help your end-users. You can enter any HTML in this sidebar.</p>
                                    <p>This sidebar can be a 'fixed to top' or you can unpin it to scroll with main page.</p>
                                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                                </div>
                                <!-- /.col-md-12 -->

                                <div class="text-center mt-20">
                                    <button type="button" class="btn btn-success btn-labeled">Purchase Now<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                </div>
                                <!-- /.text-center -->
                            </div>
                            <!-- /.row -->
                        </div>
                        <!-- /.container-fluid -->
                    </div>
                    <!-- /.sidebar-content -->
                </div>
                <!-- /.right-sidebar -->

            </div>
            <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /.main-wrapper -->

    <!-- ========== COMMON JS FILES ========== -->
    <script src="./public/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="./public/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="./public/js/bootstrap/bootstrap.min.js"></script>
    <script src="./public/js/pace/pace.min.js"></script>
    <script src="./public/js/lobipanel/lobipanel.min.js"></script>
    <script src="./public/js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="./public/js/prism/prism.js"></script>
    <script src="./public/js/waypoint/waypoints.min.js"></script>
    <script src="./public/js/counterUp/jquery.counterup.min.js"></script>
    <script src="./public/js/amcharts/amcharts.js"></script>
    <script src="./public/js/amcharts/serial.js"></script>
    <script src="./public/js/amcharts/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="js/amcharts/plugins/export/export.css" type="text/css" media="all" />
    <script src="./public/js/amcharts/themes/light.js"></script>
    <script src="./public/js/toastr/toastr.min.js"></script>
    <script src="./public/js/icheck/icheck.min.js"></script>
    <script src="./public/js/bootstrap-tour/bootstrap-tour.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="./public/js/main.js"></script>
    <script src="./public/js/production-chart.js"></script>
    <script src="./public/js/traffic-chart.js"></script>
    <script src="./public/js/task-list.js"></script>
    <script>
        $(function() {

            // Counter for dashboard stats
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });

            // Welcome notification
            toastr.options = {
                "closeButton": true,
                "debug": false,
                "newestOnTop": false,
                "progressBar": false,
                "positionClass": "toast-top-right",
                "preventDuplicates": false,
                "onclick": null,
                "showDuration": "300",
                "hideDuration": "1000",
                "timeOut": "3500",
                "extendedTimeOut": "1000",
                "showEasing": "swing",
                "hideEasing": "linear",
                "showMethod": "fadeIn",
                "hideMethod": "fadeOut"
            }
            toastr["success"]("Foda se :)", "Bem Vindo ao admin do Pedrin!");

        });
    </script>
</body>

</html>