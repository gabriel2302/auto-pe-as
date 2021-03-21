<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Autopeças</title>
    <link rel="icon" type="image/png" sizes="32x32" href="/template/images/favicon-32x32.png">

    <!-- ========== COMMON STYLES ========== -->
    <link rel="stylesheet" href="/template/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="/template/css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="/template/css/animate-css/animate.min.css" media="screen">
    <link rel="stylesheet" href="/template/css/lobipanel/lobipanel.min.css" media="screen">

    <!-- ========== PAGE STYLES ========== -->
    <link rel="stylesheet" href="/template/css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->
    <link rel="stylesheet" href="/template/css/toastr/toastr.min.css" media="screen">
    <link rel="stylesheet" href="/template/css/icheck/skins/line/blue.css">
    <link rel="stylesheet" href="/template/css/icheck/skins/line/red.css">
    <link rel="stylesheet" href="/template/css/icheck/skins/line/green.css">
    <link rel="stylesheet" href="/template/css/bootstrap-tour/bootstrap-tour.css">
    <link rel="stylesheet" type="text/css" href="/template/js/DataTables/datatables.min.css" />
    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/searchpanes/1.2.0/css/searchPanes.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">

    <!-- ========== THEME CSS ========== -->
    <link rel="stylesheet" href="/template/css/main.css" media="screen">

    <!-- ========== MODERNIZR ========== -->
    <script src="/template/js/modernizr/modernizr.min.js"></script>

    <!-- Jquery -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <!-- Jquery Form -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.js" integrity="sha512-RTxmGPtGtFBja+6BCvELEfuUdzlPcgf5TZ7qOVRmDfI9fDdX2f1IwBq+ChiELfWt72WY34n0Ti1oo2Q3cWn+kw==" crossorigin="anonymous"></script>

    <!--Jquery Mask (formatação de campos) -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.0/jquery.mask.js"></script>

</head>

<body class="top-navbar-fixed">
    <div class="main-wrapper">

        <!-- ========== TOP NAVBAR ========== -->
        <nav class="navbar top-navbar bg-white box-shadow">
            <div class="container-fluid">
                <div class="row">
                    <div class="navbar-header no-padding">
                        <a class="navbar-brand" href="/">
                            <img src="/template/images/logomarca.png" alt="AutoPeças" class="logo">
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

                        <ul class="nav navbar-nav navbar-right" data-dropdown-in="fadeIn" data-dropdown-out="fadeOut">
                            <li class="dropdown tour-two">
                                <a href="#" class="dropdown-toggle" data-toggle="modal" data-target="#modal-sair" role="button" aria-haspopup="true" aria-expanded="false">{{session('usuario_nome')}}</a>

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
                            <h6 class="title">Administrador</h6>
                        </div>
                        <!-- /.user-info -->

                        <div class="sidebar-nav">
                            @if(session('usuario_funcao_id')=='1' || session('usuario_funcao_id')=='2')
                            <ul class="side-nav color-gray">
                                <li class="has-children">
                                    <a href="#"><i class="fa fa-users"></i> <span>Clientes</span> <i class="fa fa-angle-right arrow"></i></a>
                                    <ul class="child-nav">
                                        <li><a href="/clientes/cadastrar-pf"><i class="fa fa-pencil"></i> <span>Cadastrar pessoa física</span></a></li>
                                        <li><a href="/clientes/cadastrar-pj"><i class="fa fa-pencil"></i> <span>Cadastrar pessoa jurídica</span></a></li>
                                        <li><a href="/clientes"><i class="fa fa-list"></i> <span>Visualizar</span></a></li>
                                    </ul>
                                </li>
                            </ul>

                            <ul class="side-nav color-gray">
                                <li class="has-children">
                                    <a href="#"><i class="fa fa-cart-plus" aria-hidden="true"></i><span>Produtos</span><i class="fa fa-angle-right arrow"></i></a>
                                    <ul class="child-nav">
                                        <li><a href="/produtos/cadastrar"><i class="fa fa-pencil"></i> <span>Cadastrar </span></a></li>
                                        <li><a href="/produtos"><i class="fa fa-list"></i> <span>Visualizar</span></a></li>
                                        <li><a href="/produtos/entrada"><i class="fa fa-cart-arrow-down"></i> <span>Entradas</span></a></li>
                                    </ul>
                                </li>

                            </ul>
                            @endif
                            @if(session('usuario_funcao_id')=='1')
                            <ul class="side-nav color-gray">
                                <li class="has-children">
                                    <a href="#"><i class="fa fa-user"></i> <span>Usuários</span><i class="fa fa-angle-right arrow"></i></a>
                                    <ul class="child-nav">
                                        <li><a href="/usuarios/cadastrar"><i class="fa fa-pencil"></i> <span>Cadastrar </span></a></li>
                                        <li><a href="/usuarios"><i class="fa fa-list"></i> <span>Visualizar</span></a></li>
                                    </ul>
                                </li>

                            </ul>

                            <ul class="side-nav color-gray">
                                <li class="has-children">
                                    <a href="#"><i class="fa fa-folder" aria-hidden="true"></i><span>Parâmetros</span><i class="fa fa-angle-right arrow"></i></a>
                                    <ul class="child-nav">
                                        <li><a href="/categorias"><i class="fa fa-list"></i> <span>Categorias </span></a></li>
                                        <li><a href="/marcas"><i class="fa fa-list"></i> <span>Marcas </span></a></li>
                                        <li><a href="/parametros-de-venda"><i class="fa fa-list"></i> <span>Parâmetros de venda </span></a></li>
                                    </ul>
                                </li>
                            </ul>
                            @endif

                            <ul class="side-nav color-gray">
                                <li class="has-children">
                                    <a href="#"><i class="fa fa-money" aria-hidden="true"></i><span>Vendas</span><i class="fa fa-angle-right arrow"></i></a>
                                    <ul class="child-nav">
                                        <li><a href="/vendas"><i class="fa fa-pencil"></i> <span>Cadastrar </span></a></li>
                                        <li><a href="/vendas/visualizar"><i class="fa fa-list"></i> <span>Visualizar </span></a></li>
                                    </ul>
                                </li>
                            </ul>

                            <ul class="side-nav color-gray">
                                <li class="has-children">
                                    <a href="#" data-toggle="modal" data-target="#modal-sair">
                                        <i class="fa fa-power-off" aria-hidden="true"></i><span>Sair</span>
                                    </a>
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

                        <!-- Logout Modal-->
                        <div class="modal fade" id="modal-sair" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Você deseja sair?</h5>
                                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">Clique em "Logout" para encerrar sua sessão.</div>
                                    <div class="modal-footer">
                                        <form action="{{ route('efetua_logout') }}" method="POST">
                                            @csrf
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <button type="submit" class="btn btn-primary" id="btn-logout" name="btn-logout">Logout</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.right-sidebar -->

            </div>
            <!-- /.content-container -->
        </div>
        <!-- /.content-wrapper -->

    </div>
    <!-- /.main-wrapper -->

    <!-- ========== COMMON JS FILES ========== -->
    <script src="/template/js/jquery/jquery-2.2.4.min.js"></script>
    <script src="/template/js/jquery-ui/jquery-ui.min.js"></script>
    <script src="/template/js/bootstrap/bootstrap.min.js"></script>
    <script src="/template/js/pace/pace.min.js"></script>
    <script src="/template/js/lobipanel/lobipanel.min.js"></script>
    <script src="/template/js/iscroll/iscroll.js"></script>

    <!-- ========== PAGE JS FILES ========== -->
    <script src="/template/js/prism/prism.js"></script>
    <script src="/template/js/waypoint/waypoints.min.js"></script>
    <script src="/template/js/counterUp/jquery.counterup.min.js"></script>
    <script src="/template/js/amcharts/amcharts.js"></script>
    <script src="/template/js/amcharts/serial.js"></script>
    <script src="/template/js/amcharts/plugins/export/export.min.js"></script>
    <link rel="stylesheet" href="/template/js/amcharts/plugins/export/export.css" type="text/css" media="all" />
    <script src="/template/js/amcharts/themes/light.js"></script>
    <script src="/template/js/toastr/toastr.min.js"></script>
    <script src="/template/js/icheck/icheck.min.js"></script>
    <script src="/template/js/bootstrap-tour/bootstrap-tour.js"></script>
    <script src="/template/js/DataTables/datatables.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/searchpanes/1.2.0/js/dataTables.searchPanes.min.js"></script>
    <script type="text/javascript" language="javascript" src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>

    <!-- ========== THEME JS ========== -->
    <script src="/template/js/main.js"></script>
    <script src="/template/js/production-chart.js"></script>
    <script src="/template/js/traffic-chart.js"></script>
    <script src="/template/js/task-list.js"></script>

</body>

</html>