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
                        @else
                        {{$_GET['resposta']}}
                        @endif
                        @endif
                        <form action="" method="POST" id="form-entrar">
                            @csrf
                            <input type="hidden" id="url_form" name="url_form" value="{{route('efetua_login')}}">
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
                                    <button type="button" class="btn btn-success btn-labeled pull-right" id="btn-entrar">Entrar<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span></button>
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


    <div class="modal fade" id="modal-resposta" tabindex="-1" role="dialog" aria-labelledby="modaRespostaLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalRespostaLabel">Mensagem <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h4>
                </div>
                <div class="modal-body">
                    <p id="modal-resposta-texto"></p>
                </div>
                <div class="modal-footer">
                    <div class="btn-group" role="group">
                        <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i>Fechar</button>
                    </div>
                    <!-- /.btn-group -->
                </div>
            </div>
        </div>
    </div>

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
        $(document).ready(function() {
            $('#btn-entrar').click(function(e) {
                e.preventDefault();
                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $('#btn-entrar').html('Entrando... <span class="btn-label btn-label-right"><i class="fa fa-check"></i></span>');
                var url_atual = document.getElementById('url_form').value;
                var modal_texto = document.getElementById('modal-resposta-texto');

                $.ajax({
                    url: "" + url_atual + "",
                    method: 'post',
                    data: $('#form-entrar').serialize(),
                    success: function(response) {

                        if (response.resposta == 'liberado') {
                            modal_texto.innerHTML = '';
                            modal_texto.innerHTML = 'Login efetuado com sucesso!';
                            $('#modal-resposta').modal({
                                show: true
                            });
                            $('#btn-entrar').html('Entrar<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span>');
                            window.location.href = "/";
                        } else {
                            if (response.resposta == 'login_invalido') {
                                modal_texto.innerHTML = '';
                                modal_texto.innerHTML = 'Desculpe, mas esse o e-mail/senha são inválidos!';
                                $('#modal-resposta').modal({
                                    show: true
                                });
                                $('#btn-entrar').html('Entrar<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span>');
                            } else {
                                if (response.resposta == 'vazio') {
                                    modal_texto.innerHTML = '';
                                    modal_texto.innerHTML = 'Por favor, verifique se os campos obrigatórios foram preenchidos!';
                                    $('#modal-resposta').modal({
                                        show: true
                                    });
                                    $('#btn-entrar').html('Entrar<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span>');
                                } else {
                                    if (response.resposta == 'bloqueado') {
                                        modal_texto.innerHTML = '';
                                        modal_texto.innerHTML = 'Desculpe, mas esse usuário encontra-se bloqueado!';
                                        $('#modal-resposta').modal({
                                            show: true
                                        });
                                        $('#btn-entrar').html('Entrar<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span>');
                                    }
                                    else{
                                        modal_texto.innerHTML = '';
                                        modal_texto.innerHTML = response.resposta;
                                        $('#modal-resposta').modal({
                                            show: true
                                        });
                                        $('#btn-entrar').html('Entrar<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span>');
                                    }
                                }
                            }
                        }
                    },
                    error: function(response) {
                        modal_texto.innerHTML = '';
                        modal_texto.innerHTML = 'Erro: ' + response.responseJSON.message;
                        $('#modal-resposta').modal({
                            show: true
                        });
                        $('#btn-entrar').html('Entrar<span class="btn-label btn-label-right"><i class="fa fa-check"></i></span>');
                    }
                });
            });
        });
    </script>

    <!-- ========== ADD custom.js FILE BELOW WITH YOUR CHANGES ========== -->
</body>

</html>