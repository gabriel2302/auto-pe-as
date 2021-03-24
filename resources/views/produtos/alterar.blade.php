@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
    <div class="col-md-6">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
            <li><a href="/clientes">Produtos</a></li>
            <li class="active">Alterar produto </li>
        </ul>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h5>Alterar produto</h5>
                </div>
            </div>
            <div class="panel-body">
                @foreach($produtos as $produto)
                <form class="p-20" action="javascript:void(0)" method="POST" id="form-alterar-produto">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" id="url_form" name="url_form" value="{{route('produtos-alterar')}}">
                    <input type="hidden" name="id_produto" value="{{$produto->id_produto}}">
                    <div id="campos-cadastro">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Nome <b>*</b></label>
                                    <input type="text" class="form-control" id="nome" name="nome" value="{{$produto->nome}}">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="numero">Valor <b>*</b></label>
                                <input type="number" min="0.00" step="0.01" class="form-control" id="valor" name="valor" value="{{$produto->valor}}">
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="complemento">Categoria <b>*</b></label>
                                    <select class="form-control" id="categoria" name="categoria">
                                        <option value="">Selecione</option>
                                        @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id_categoria }}" {{$produto->categoria_id==$categoria->id_categoria?'selected':''}}>{{ $categoria->descricao }}</option>
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
                                        <option value="{{ $marca->id_marca }}" {{$produto->marca_id==$marca->id_marca?'selected':''}}>{{ $marca->descricao }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cep">Descrição</label>
                                    <textarea class="form-control" name="descricao" id="descricao" cols="1" rows="3">{{$produto->descricao}}</textarea>
                                </div>
                            </div>

                        </div>
                        <small class="form-text text-muted">Os campos com <b>*</b> são obrigatórios o preenchimento!</small>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right mt-10" role="group">
                                <a href="#" class="btn bg-black btn-wide" data-toggle="modal" data-target="#modal-voltar"><i class="fa fa-arrow-left"></i> Voltar</a>
                                    <a href="#" class="btn bg-danger btn-wide" data-toggle="modal" data-target="#modal-limpar"><i class="fa fa-eraser"></i> Limpar</a>
                                    <button type="button" class="btn btn-primary btn-wide" id="btn-alterar"><i class="fa fa-arrow-right"></i> Alterar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                </form>
                @endforeach
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
                <p>Você tem certeza que deseja retornar para a página de produtos sem salvar?</p>
            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                    <a href="/produtos" class="btn btn-success btn-wide btn-rounded"><i class="fa fa-arrow-left"></i> Voltar</a>
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
                    <a href="#" onclick="limpar()" data-dismiss="modal" class="btn btn-danger btn-wide btn-rounded"><i class="fa fa-eraser"></i> Limpar</a>
                </div>
                <!-- /.btn-group -->
            </div>
        </div>
    </div>
</div>

<script>
    function limpar()
    {
        document.getElementById('nome').value='';
        document.getElementById('valor').value='';
        document.getElementById('categoria').value='';
        document.getElementById('marca').value='';
        document.getElementById('descricao').value='';
    }


    $(document).ready(function() {
        $('#btn-alterar').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#btn-alterar').html('<i class="fa fa-arrow-right"></i> Alterando...');
            var url_atual = document.getElementById('url_form').value;
            var modal_texto = document.getElementById('modal-resposta-texto');

            $.ajax({
                url: "" + url_atual + "",
                method: 'post',
                data: $('#form-alterar-produto').serialize(),
                success: function(response) {

                    if (response.resposta == 'alterado') {
                        modal_texto.innerHTML = '';
                        modal_texto.innerHTML = 'Produto alterado com sucesso!';
                        $('#modal-resposta').modal({
                            show: true
                        });
                        $('#btn-alterar').html('<i class="fa fa-arrow-right"></i> Alterar');
                        window.location.href = "/produtos";
                    } else {
                        if (response.resposta == 'vazio') {
                            modal_texto.innerHTML = '';
                            modal_texto.innerHTML = 'Por favor, verifique se os campos obrigatórios foram preenchidos!';
                            $('#modal-resposta').modal({
                                show: true
                            });
                            $('#btn-alterar').html('<i class="fa fa-arrow-right"></i> Alterar');
                        }
                    }
                },
                error: function(response) {
                    modal_texto.innerHTML = '';
                    modal_texto.innerHTML = 'Erro: ' + response.responseJSON.message;
                    $('#modal-resposta').modal({
                        show: true
                    });
                    $('#btn-alterar').html('<i class="fa fa-arrow-right"></i> Alterar');
                }
            });
        });
    });
</script>
@stop