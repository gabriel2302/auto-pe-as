@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
    <div class="col-md-6">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
            <li><a href="/usuarios">Usuários</a></li>
            <li class="active">Cadastrar usuário</li>
        </ul>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h5>Cadastrar usuário</h5>
                </div>
            </div>
            <div class="panel-body">

                <form class="p-20" action="javascript:void(0)" method="POST" id="form-cadastrar-usuario">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" id="url_form" name="url_form" value="{{route('usuarios-cadastrar')}}">
                    <div class="row">
                        <div class="col-md-2">
                            <div class="form-group">
                                <label for="cpf">CPF <b>*</b></label>
                                <input type="text" class="form-control" id="cpf" name="cpf">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <br>
                                <button class="btn btn-primary" onclick="verificarUsuario()"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <br>
                            <span>Por favor, digite o número do CPF do usuário para que verifique se já está cadastrado!</span>
                        </div>
                    </div>

                    <div id="campos-cadastro" style="display: none;">
                        <h5 class="underline mt-n">Informações pessoais</h5>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="nome">Nome <b>*</b></label>
                                    <input type="text" class="form-control" id="nome" name="nome">
                                    <input type="hidden" id="tipo_pessoa" name="tipo_pessoa" value="pf">
                                </div>
                            </div>
                           

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="funcao">Função <b>*</b></label>
                                    <select class="form-control" id="funcao_id" name="funcao_id">
                                        <option value="">Selecione</option>
                                        @foreach($funcoes as $funcao)
                                        <option value="{{ $funcao->id_funcao }}">{{ $funcao->descricao }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="email">E-mail <b>*</b></label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="senha">Senha <b>*</b></label>
                                    <input type="password" class="form-control" id="senha" name="senha">
                                </div>
                            </div>
                        </div>

                        <h5 class="underline mt-30">Informações de contato</h5>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="cep">CEP <b>*</b></label>
                                    <input type="text" class="form-control" id="cep" name="cep">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="endereco">Endereço <b>*</b></label>
                                    <input type="text" class="form-control" id="endereco" name="endereco">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <label for="numero">Número <b>*</b></label>
                                <input type="number" min="0" class="form-control" id="numero" name="numero">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="complemento">Complemento</label>
                                    <input type="text" class="form-control" id="complemento" name="complemento">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bairro">Bairro <b>*</b></label>
                                    <input type="text" class="form-control" id="bairro" name="bairro">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cidade">Cidade <b>*</b></label>
                                    <input type="text" class="form-control" id="cidade" name="cidade" readonly>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="estado">Estado <b>*</b></label>
                                    <input type="text" class="form-control" id="estado" name="estado" readonly>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="celular">Celular</label>
                                    <input type="text" class="form-control" id="celular" name="celular">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="whatsapp">WhatsApp</label>
                                    <input type="text" class="form-control" id="whatsapp" name="whatsapp">
                                </div>
                            </div>
                          
                        </div>

                        <small class="form-text text-muted">Os campos com <b>*</b> são obrigatórios o preenchimento!</small>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right mt-10" role="group">
                                     <a href="#" class="btn bg-black btn-wide" data-toggle="modal" data-target="#modal-voltar"><i class="fa fa-arrow-left"></i> Voltar</a>
                                    <a href="#" class="btn bg-danger btn-wide" data-toggle="modal" data-target="#modal-limpar"><i class="fa fa-eraser"></i> Limpar</a>
                                    <button type="button" class="btn btn-primary btn-wide" id="btn-cadastrar"><i class="fa fa-arrow-right"></i> Cadastrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
</div>


<div class="modal fade" id="modal-voltar" tabindex="-1" role="dialog" aria-labelledby="modalVoltarLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalVoltarLabel">Mensagem <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h4>
            </div>
            <div class="modal-body">
                <p>Você tem certeza que deseja retornar para a página de usuários sem salvar?</p>
            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                    <a href="/usuarios" class="btn btn-success btn-wide btn-rounded"><i class="fa fa-arrow-left"></i> Voltar</a>
                </div>
                <!-- /.btn-group -->
            </div>
        </div>
    </div>
</div>

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
                    <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                </div>
                <!-- /.btn-group -->
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-limpar" tabindex="-1" role="dialog" aria-labelledby="modalLimparLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalLimparLabel">Mensagem <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h4>
            </div>
            <div class="modal-body">
                <p>Você tem certeza que deseja limpar os campos?</p>
            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                    <a href="#" onclick="document.getElementById('form-cadastrar-usuario').reset()" data-dismiss="modal" class="btn btn-danger btn-wide btn-rounded"><i class="fa fa-eraser"></i> Limpar</a>
                </div>
                <!-- /.btn-group -->
            </div>
        </div>
    </div>
</div>

<script>
    function verificarUsuario() {
        var cpf = document.getElementById('cpf').value;
        var modal_texto = document.getElementById('modal-resposta-texto');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/usuarios/verificar-usuario",
            method: 'post',
            data: {
                'cpf': cpf,
            },
            success: function(response) {

                if (response.resposta == 'vazio') {
                    document.getElementById('campos-cadastro').style.display = 'none';
                    modal_texto.innerHTML = '';
                    modal_texto.innerHTML = 'Por favor, verifique se o CPF foi digitado!';
                    $('#modal-resposta').modal({
                        show: true
                    });
                } else if (response.resposta == 'usuario_cadastrado') {
                    document.getElementById('campos-cadastro').style.display = 'none';
                    modal_texto.innerHTML = '';
                    modal_texto.innerHTML = 'Desculpe, mas esse usuário já está cadastrado!';
                    $('#modal-resposta').modal({
                        show: true
                    });
                } else if (response.resposta == 'usuario_nao_cadastrado') {
                    document.getElementById('campos-cadastro').style.display = '';
                } else if (response.resposta == 'cpf_invalido') {
                    document.getElementById('campos-cadastro').style.display = 'none';
                    modal_texto.innerHTML = '';
                    modal_texto.innerHTML = 'Desculpe, mas esse CPF é inválido!';
                    $('#modal-resposta').modal({
                        show: true
                    });
                }

            },
            error: function(response) {
                modal_texto.innerHTML = '';
                modal_texto.innerHTML = 'Erro: ' + response.responseJSON.message;
                $('#modal-resposta').modal({
                    show: true
                });
            }
        });
    }

    $(document).ready(function() {
        $('#btn-cadastrar').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#btn-cadastrar').html('<i class="fa fa-arrow-right"></i> Cadastrando...');
            var url_atual = document.getElementById('url_form').value;
            var modal_texto = document.getElementById('modal-resposta-texto');

            $.ajax({
                url: "" + url_atual + "",
                method: 'post',
                data: $('#form-cadastrar-usuario').serialize(),
                success: function(response) {

                    if (response.resposta == 'cadastrado') {
                        modal_texto.innerHTML = '';
                        modal_texto.innerHTML = 'Usuário cadastrado com sucesso!';
                        $('#modal-resposta').modal({
                            show: true
                        });
                        document.getElementById("form-cadastrar-usuario").reset();
                        $('#btn-cadastrar').html('<i class="fa fa-arrow-right"></i> Cadastrar');
                        window.location.href = "/usuarios";
                    } else {
                        if (response.resposta == 'usuario_cadastrado') {
                            modal_texto.innerHTML = '';
                            modal_texto.innerHTML = 'Desculpe, mas já existe um usuário cadastrado com esse CPF ou e-mail!';
                            $('#modal-resposta').modal({
                                show: true
                            });
                            $('#btn-cadastrar').html('<i class="fa fa-arrow-right"></i> Cadastrar');
                        } else {
                            if (response.resposta == 'vazio') {
                                modal_texto.innerHTML = '';
                                modal_texto.innerHTML = 'Por favor, verifique se os campos obrigatórios foram preenchidos!';
                                $('#modal-resposta').modal({
                                    show: true
                                });
                                $('#btn-cadastrar').html('<i class="fa fa-arrow-right"></i> Cadastrar');
                            } else {
                                if (response.resposta == 'cpf_invalido') {
                                    modal_texto.innerHTML = '';
                                    modal_texto.innerHTML = 'Desculpe, mas esse CPF é inválido!';
                                    $('#modal-resposta').modal({
                                        show: true
                                    });
                                    $('#btn-cadastrar').html('<i class="fa fa-arrow-right"></i> Cadastrar');
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
                    $('#btn-cadastrar').html('<i class="fa fa-arrow-right"></i> Cadastrar');
                }
            });
        });
    });

    /* Preenchimento de endereço, bairro, cidade e estado através da API VIA CEP */
    const $campoCep = document.querySelector('[name="cep"]');
    const $campoEndereco = document.querySelector('[name="endereco"]');
    const $campoBairro = document.querySelector('[name="bairro"]');
    const $campoCidade = document.querySelector('[name="cidade"]');
    const $campoEstado = document.querySelector('[name="estado"]');

    $campoCep.addEventListener("blur", infosDoEvento => {
        const cep = infosDoEvento.target.value;
        fetch(`https://viacep.com.br/ws/${cep}/json/`)
            .then(respostaDoServer => {
                return respostaDoServer.json();
            })
            .then(dadosDoCep => {
                console.log(dadosDoCep);
                $campoCidade.value = dadosDoCep.localidade;
                $campoEstado.value = dadosDoCep.uf;
                $campoEndereco.value = dadosDoCep.logradouro;
                $campoBairro.value = dadosDoCep.bairro;
            });
    });

    /* Formatação dos campos CPF, CEP, telefone, celular e WhatsApp */
    var $cpf = $("#cpf");
    $cpf.mask('000.000.000-00');

    var $cep = $("#cep");
    $cep.mask('00000-000');

    var $telefone = $("#telefone");
    $telefone.mask('(00) 0000-0000');

    var $celular = $("#celular");
    $celular.mask('(00) 00000-0000');

    var $whatsapp = $("#whatsapp");
    $whatsapp.mask('(00) 00000-0000');
</script>
@stop