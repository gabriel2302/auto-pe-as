@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
    <div class="col-md-6">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
            <li><a href="/clientes">Clientes</a></li>
            <li class="active">Cadastrar cliente (pessoa jurídica)</li>
        </ul>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h5>Cadastrar cliente (pessoa jurídica)</h5>
                </div>
            </div>
            <div class="panel-body">

                <form class="p-20" action="javascript:void(0)" method="POST" id="form-cadastrar-cliente">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" id="url_form" name="url_form" value="{{route('clientes-cadastrar')}}">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="cpf_cnpj">CNPJ <b>*</b></label>
                                <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <br>
                                <button class="btn btn-primary" onclick="verificarCliente()"><i class="fa fa-search"></i></button>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <br>
                            <span>Por favor, digite o número do CNPJ do cliente para que verifique se já está cadastrado!</span>
                        </div>
                    </div>

                    <div id="campos-cadastro" style="display: none;">
                        <h5 class="underline mt-n">Informações pessoais</h5>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Nome fantasia<b>*</b></label>
                                    <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia">
                                    <input type="hidden" id="tipo_pessoa" name="tipo_pessoa" value="pj">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Razão social<b>*</b></label>
                                    <input type="text" class="form-control" id="razao_social" name="razao_social">
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
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email">
                                </div>
                            </div>

                        </div>

                        <small class="form-text text-muted">Os campos com <b>*</b> são obrigatórios o preenchimento!</small>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right mt-10" role="group">
                                    <a href="/clientes" class="btn bg-black btn-wide"><i class="fa fa-times"></i>Voltar</a href="/clientes">
                                    <button type="button" class="btn btn-primary btn-wide" id="btn-cadastrar"><i class="fa fa-arrow-right"></i>Cadastrar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
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
                    <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i>Fechar</button>
                </div>
                <!-- /.btn-group -->
            </div>
        </div>
    </div>
</div>

<script>
    function verificarCliente() {
        var cpf_cnpj = document.getElementById('cpf_cnpj').value;
        var modal_texto = document.getElementById('modal-resposta-texto');

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/clientes/verificar-cliente",
            method: 'post',
            data: {
                'cpf_cnpj': cpf_cnpj,
            },
            success: function(response) {

                if (response.resposta == 'vazio') {
                    document.getElementById('campos-cadastro').style.display = 'none';
                    modal_texto.innerHTML = '';
                    modal_texto.innerHTML = 'Por favor, verifique se o CNPJ foi digitado!';
                    $('#modal-resposta').modal({
                        show: true
                    });
                } else if (response.resposta == 'cliente_cadastrado') {
                    document.getElementById('campos-cadastro').style.display = 'none';
                    modal_texto.innerHTML = '';
                    modal_texto.innerHTML = 'Desculpe, mas esse cliente já está cadastrado!';
                    $('#modal-resposta').modal({
                        show: true
                    });
                } else if (response.resposta == 'cliente_nao_cadastrado') {
                    document.getElementById('campos-cadastro').style.display = '';
                } else if (response.resposta == 'cpf_cnpj_invalido') {
                    document.getElementById('campos-cadastro').style.display = 'none';
                    modal_texto.innerHTML = '';
                    modal_texto.innerHTML = 'Desculpe, mas esse CNPJ é inválido!';
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

            $('#btn-cadastrar').html('Cadastrando...');
            var url_atual = document.getElementById('url_form').value;
            var modal_texto = document.getElementById('modal-resposta-texto');

            $.ajax({
                url: "" + url_atual + "",
                method: 'post',
                data: $('#form-cadastrar-cliente').serialize(),
                success: function(response) {

                    if (response.resposta == 'cadastrado') {
                        modal_texto.innerHTML = '';
                        modal_texto.innerHTML = 'Cliente cadastrado com sucesso!';
                        $('#modal-resposta').modal({
                            show: true
                        });
                        document.getElementById("form-cadastrar-cliente").reset();
                        $('#btn-cadastrar').html('Cadastrar');
                        window.location.href = "/clientes";
                    } else {
                        if (response.resposta == 'cliente_cadastrado') {
                            modal_texto.innerHTML = '';
                            modal_texto.innerHTML = 'Desculpe, mas esse cliente já está cadastrado!';
                            $('#modal-resposta').modal({
                                show: true
                            });
                            $('#btn-cadastrar').html('Cadastrar');
                        } else {
                            if (response.resposta == 'vazio') {
                                modal_texto.innerHTML = '';
                                modal_texto.innerHTML = 'Por favor, verifique se os campos obrigatórios foram preenchidos!';
                                $('#modal-resposta').modal({
                                    show: true
                                });
                                $('#btn-cadastrar').html('Cadastrar');
                            } else {
                                if (response.resposta == 'cpf_cnpj_invalido') {
                                    modal_texto.innerHTML = '';
                                    modal_texto.innerHTML = 'Desculpe, mas esse CNPJ é inválido!';
                                    $('#modal-resposta').modal({
                                        show: true
                                    });
                                    $('#btn-cadastrar').html('Cadastrar');
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
                    $('#btn-cadastrar').html('Cadastrar');
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
    var $cnpj = $("#cpf_cnpj");
    $cnpj.mask('00.000.000/0000-00');

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