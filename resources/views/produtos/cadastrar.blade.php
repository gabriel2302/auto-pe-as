@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
    <div class="col-md-6">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
            <li><a href="/clientes">Produtos</a></li>
            <li class="active">Cadastrar produto </li>
        </ul>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h5>Cadastrar produto</h5>
                </div>
            </div>
            <div class="panel-body">

                <form class="p-20" action="javascript:void(0)" method="POST" id="form-cadastrar-produto">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" id="url_form" name="url_form" value="{{route('produtos-cadastrar')}}">
                    <div id="campos-cadastro">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Nome <b>*</b></label>
                                    <input type="text" class="form-control" id="nome" name="nome">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="numero">Valor <b>*</b></label>
                                <input type="number" min="0.00" step="0.01" class="form-control" id="valor" name="valor">
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="complemento">Categoria <b>*</b></label>
                                    <select class="form-control" id="categoria" name="categoria">
                                        <option value="">Selecione</option>
                                        @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id_categoria }}">{{ $categoria->descricao }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="marca">Marca <b>*</b></label>
                                    <select class="form-control" id="marca" name="marca">
                                        <option value="">Selecione</option>
                                        @foreach($marcas as $marca)
                                        <option value="{{ $marca->id_marca }}">{{ $marca->descricao }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cep">Descrição</label>
                                    <textarea class="form-control" name="descricao" id="descricao" cols="1" rows="3"></textarea>
                                </div>
                            </div>

                        </div>
                        <small class="form-text text-muted">Os campos com <b>*</b> são obrigatórios o preenchimento!</small>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right mt-10" role="group">
                                    <a href="/produtos" class="btn bg-black btn-wide"><i class="fa fa-times"></i>Voltar</a href="/clientes">
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
                data: $('#form-cadastrar-produto').serialize(),
                success: function(response) {

                    if (response.resposta == 'cadastrado') {
                        modal_texto.innerHTML = '';
                        modal_texto.innerHTML = 'Produto cadastrado com sucesso!';
                        $('#modal-resposta').modal({
                            show: true
                        });
                        document.getElementById("form-cadastrar-produto").reset();
                        $('#btn-cadastrar').html('Cadastrar');
                        window.location.href = "/produtos";
                    } else {
                        if (response.resposta == 'vazio') {
                            modal_texto.innerHTML = '';
                            modal_texto.innerHTML = 'Por favor, verifique se os campos obrigatórios foram preenchidos!';
                            $('#modal-resposta').modal({
                                show: true
                            });
                            $('#btn-cadastrar').html('Cadastrar');
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
</script>
@stop