<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Auto Peças</title>

    <!-- ========== COMMON STYLES ========== -->
    <link rel="stylesheet" href="/template/css/bootstrap.min.css" media="screen">
    <link rel="stylesheet" href="/template/css/font-awesome.min.css" media="screen">
    <link rel="stylesheet" href="/template/css/animate-css/animate.min.css" media="screen">

    <!-- ========== PAGE STYLES ========== -->
    <link rel="stylesheet" href="/template/css/prism/prism.css" media="screen"> <!-- USED FOR DEMO HELP - YOU CAN REMOVE IT -->

    <!-- ========== THEME CSS ========== -->
    <link rel="stylesheet" href="/template/css/main.css" media="screen">

    <!-- ========== MODERNIZR ========== -->
    <script src="/template/js/modernizr/modernizr.min.js"></script>
</head>

<body class="">
    <div class="main-wrapper">

        <div class="login-bg">
            <div class="row">
                <div class="col-md-4 col-md-offset-4">
                    <div class="login-box">
                        <h4 class="text-center mt-10 mb-20">Auto Peças</h4>
                        @if($_GET['resposta'] ?? '')
                        @if($_GET['resposta']=='bloqueado')
                        <div class="alert alert-danger" role="alert">
                            Desculpe, mas esse login encontra-se bloqueado. Entre em contato com o administrador!
                        </div>
                        @elseif($_GET['resposta']=='vazio')
                        <div class="alert alert-danger" role="alert">
                            Por favor, verifique se o login e senha foram informados!
                        </div>
                        @elseif($_GET['resposta']=='login_invalido')
                        <div class="alert alert-danger" role="alert">
                            Login e/ou senha inválidos!
                        </div>
                        @endif
                        @endif
                        <form action="{{route('efetua_login')}}" method="POST">
                        @csrf
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control input-lg" id="email" name="email" autofocus autocomplete="off" required>
                            </div>
                            <div class="form-group">
                                <label for="senha">Senha</label>
                                <input type="password" class="form-control input-lg" id="senha" name="senha" required>
                            </div>

                            <div class="form-group mt-20">
                                <div class="">
                                    <button type="submit" class="btn btn-success btn-labeled pull-right">Entrar<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </form>

                    </div>
                    <!-- /.login-box -->
                </div>
                <!-- /.col-md-6 col-md-offset-3 -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /. -->

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

    <!-- ========== THEME JS ========== -->
    <script src="/template/js/main.js"></script>
    <script>
        $(function() {

        });
    </script>

    <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
</body>

</html>