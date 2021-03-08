@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
    <div class="col-md-6">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
            <li><a href="/clientes">Clientes</a></li>
            <li class="active">Alterar cliente</li>
        </ul>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h5>Alterar cliente</h5>
                </div>
            </div>
            <div class="panel-body">
                @foreach($dados_cliente as $cliente)
                @if($cliente->tipo_pessoa=='pessoa_fisica')
                <div id="campos-cadastro-pf">
                    <form class="p-20" action="javascript:void(0)" method="POST" id="form-alterar-cliente">
                        @csrf
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="hidden" id="url_form" name="url_form" value="{{route('clientes-alterar')}}">

                        <h5 class="underline mt-n">Informações pessoais</h5>

                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="nome">Nome <b>*</b></label>
                                    <input type="text" class="form-control" id="nome" name="nome" value="{{$cliente->nome_fantasia}}">
                                    <input type="hidden" id="tipo_pessoa" name="tipo_pessoa" value="pf">
                                    <input type="hidden" id="id_cliente" name="id_cliente" value="{{$cliente->id_cliente}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="cpf_cnpj">CPF <b>*</b></label>
                                    <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value="{{$cliente->cpf_cnpj}}">
                                </div>
                            </div>
                        </div>

                        <h5 class="underline mt-30">Informações de contato</h5>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="cep">CEP <b>*</b></label>
                                    <input type="text" class="form-control" id="cep" name="cep" value="{{$cliente->cep}}">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="endereco">Endereço <b>*</b></label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" value="{{$cliente->endereco}}">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <label for="numero">Número <b>*</b></label>
                                <input type="number" min="0" class="form-control" id="numero" name="numero" value="{{$cliente->numero}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="complemento">Complemento</label>
                                    <input type="text" class="form-control" id="complemento" name="complemento" value="{{$cliente->complemento}}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bairro">Bairro <b>*</b></label>
                                    <input type="text" class="form-control" id="bairro" name="bairro" value="{{$cliente->bairro}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cidade">Cidade <b>*</b></label>
                                    <input type="text" class="form-control" id="cidade" name="cidade" readonly value="{{$cliente->cidade}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="estado">Estado <b>*</b></label>
                                    <input type="text" class="form-control" id="estado" name="estado" readonly value="{{$cliente->estado}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" value="{{$cliente->telefone}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="celular">Celular</label>
                                    <input type="text" class="form-control" id="celular" name="celular" value="{{$cliente->celular}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="whatsapp">WhatsApp</label>
                                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{$cliente->whatsapp}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{$cliente->email}}">
                                </div>
                            </div>

                        </div>

                        <small class="form-text text-muted">Os campos com <b>*</b> são obrigatórios o preenchimento!</small>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right mt-10" role="group">
                                    <a href="/clientes" class="btn bg-black btn-wide"><i class="fa fa-times"></i>Voltar</a href="/clientes">
                                    <button type="button" class="btn btn-primary btn-wide" id="btn-alterar" onclick="alterar()"><i class="fa fa-arrow-right"></i>Alterar</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                @else
                <div id="campos-cadastro-pj">
                    <form class="p-20" action="javascript:void(0)" method="POST" id="form-alterar-cliente">
                        @csrf
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <input type="hidden" id="url_form" name="url_form" value="{{route('clientes-alterar')}}">

                        <h5 class="underline mt-n">Informações pessoais</h5>

                        <div class="row">
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="nome_fantasia">Nome fantasia <b>*</b></label>
                                    <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" value="{{$cliente->nome_fantasia}}">
                                    <input type="hidden" id="tipo_pessoa" name="tipo_pessoa" value="pj">
                                    <input type="hidden" id="id_cliente" name="id_cliente" value="{{$cliente->id_cliente}}">
                                </div>
                            </div>
                            <div class="col-md-5">
                                <div class="form-group">
                                    <label for="razao_social">Razão social <b>*</b></label>
                                    <input type="text" class="form-control" id="razao_social" name="razao_social" value="{{$cliente->razao_social}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cpf_cnpj">CNPJ <b>*</b></label>
                                    <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value="{{$cliente->cpf_cnpj}}">
                                </div>
                            </div>
                        </div>

                        <h5 class="underline mt-30">Informações de contato</h5>

                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="cep">CEP <b>*</b></label>
                                    <input type="text" class="form-control" id="cep" name="cep" value="{{$cliente->cep}}">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-10">
                                <div class="form-group">
                                    <label for="endereco">Endereço <b>*</b></label>
                                    <input type="text" class="form-control" id="endereco" name="endereco" value="{{$cliente->endereco}}">
                                </div>
                            </div>

                            <div class="col-md-2">
                                <label for="numero">Número <b>*</b></label>
                                <input type="number" min="0" class="form-control" id="numero" name="numero" value="{{$cliente->numero}}">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="complemento">Complemento</label>
                                    <input type="text" class="form-control" id="complemento" name="complemento" value="{{$cliente->complemento}}">
                                </div>
                            </div>

                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="bairro">Bairro <b>*</b></label>
                                    <input type="text" class="form-control" id="bairro" name="bairro" value="{{$cliente->bairro}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="cidade">Cidade <b>*</b></label>
                                    <input type="text" class="form-control" id="cidade" name="cidade" readonly value="{{$cliente->cidade}}">
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="form-group">
                                    <label for="estado">Estado <b>*</b></label>
                                    <input type="text" class="form-control" id="estado" name="estado" readonly value="{{$cliente->estado}}">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="telefone">Telefone</label>
                                    <input type="text" class="form-control" id="telefone" name="telefone" value="{{$cliente->telefone}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="celular">Celular</label>
                                    <input type="text" class="form-control" id="celular" name="celular" value="{{$cliente->celular}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="whatsapp">WhatsApp</label>
                                    <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{$cliente->whatsapp}}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="email">E-mail</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{$cliente->email}}">
                                </div>
                            </div>

                        </div>

                        <small class="form-text text-muted">Os campos com <b>*</b> são obrigatórios o preenchimento!</small>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right mt-10" role="group">
                                    <a href="/clientes" class="btn bg-black btn-wide"><i class="fa fa-times"></i>Voltar</a href="/clientes">
                                    <button type="button" class="btn btn-primary btn-wide" id="btn-alterar" onclick="alterar()"><i class="fa fa-arrow-right"></i>Alterar</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
                @endif
                @endforeach
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
    function alterar() {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $('#btn-alterar').html('Alterando...');
        var url_atual = document.getElementById('url_form').value;
        var modal_texto = document.getElementById('modal-resposta-texto');

        $.ajax({
            url: "" + url_atual + "",
            method: 'post',
            data: $('#form-alterar-cliente').serialize(),
            success: function(response) {

                if (response.resposta == 'alterado') {
                    modal_texto.innerHTML = '';
                    modal_texto.innerHTML = 'Cliente alterado com sucesso!';
                    $('#modal-resposta').modal({
                        show: true
                    });
                    document.getElementById("form-alterar-cliente").reset();
                    $('#btn-alterar').html('Alterar');
                    window.location.href = "/clientes";
                } else {
                    if (response.resposta == 'cliente_cadastrado') {
                        modal_texto.innerHTML = '';
                        modal_texto.innerHTML = 'Desculpe, mas esse cliente já está cadastrado!';
                        $('#modal-resposta').modal({
                            show: true
                        });
                        $('#btn-alterar').html('Alterar');
                    } else {
                        if (response.resposta == 'vazio') {
                            modal_texto.innerHTML = '';
                            modal_texto.innerHTML = 'Por favor, verifique se os campos obrigatórios foram preenchidos!';
                            $('#modal-resposta').modal({
                                show: true
                            });
                            $('#btn-alterar').html('Alterar');
                        } else {
                            if (response.resposta == 'cpf_cnpj_invalido') {
                                modal_texto.innerHTML = '';
                                modal_texto.innerHTML = 'Desculpe, mas esse CPF é inválido!';
                                $('#modal-resposta').modal({
                                    show: true
                                });
                                $('#btn-alterar').html('Alterar');
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
                $('#btn-alterar').html('Alterar');
            }
        });
    }

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
    var tipo_pessoa = document.getElementById('tipo_pessoa').value;
    if (tipo_pessoa == 'pf') {
        var $cpf = $("#cpf_cnpj");
        $cpf.mask('000.000.000-00');
    } else {
        var $cnpj = $("#cpf_cnpj");
        $cnpj.mask('00.000.000/0000-00');
    }
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