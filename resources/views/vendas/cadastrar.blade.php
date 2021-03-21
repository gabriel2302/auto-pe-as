@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
    <div class="col-md-6">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
            <li><a href="/clientes">Cadastrar vendas</a></li>
            <li class="active">Cadastrar vendas</li>
        </ul>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h5>Cadastrar vendas</h5>
                </div>
            </div>
            <div class="panel-body">

                <form class="p-20" action="javascript:void(0)" method="POST" id="form-cadastrar-produto">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" id="url_form" name="url_form" value="{{route('produtos-cadastrar')}}">
                    <div id="campos-cadastro">
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="produto">Cliente <b>*</b></label>
                                <select class="form-control" id="produto" name="produto[1][produto_id]">
                                    <option value="">Selecione</option>
                                    @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id_cliente }}">{{ $cliente->razao_social }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="pagamento">Forma de pagamento<b>*</b></label>
                                <select class="form-control" id="pagamento" name="pagamento">
                                    <option value="credito">Cartão de crédito</option>
                                    <option value="debito">Cartão de débito</option>
                                    <option value="interno">Crédito interno</option>
                                    <option value="dinheiro" selected>Dinheiro</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="desconto">Desconto <b>*</b></label>
                                <input type="number" class="form-control" id="desconto" name="desconto" max="{{ $desconto->valor }}" step="0.01">
                                </select>
                            </div>

                            <div class="col-md-3 form-group">
                                <label for="valor-total">Valor total da compra <b>*</b></label>
                                <input type="text" class="form-control" id="valor-total" name="valor-total">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="produto">Produto <b>*</b></label>
                                <select class="form-control" id="produto" name="produto[1][produto_id]">
                                    <option value="">Selecione</option>
                                    @foreach($produtos as $produto)
                                    <option value="{{ $produto->id_produto }}">{{ $produto->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="quantidade">Quantidade <b>*</b></label>
                                <input type="number" class="form-control" id="quantidade" name="produto[1][quantidade]">
                            </div>

                            <div class="col-md-3">
                                <label for="valor-unitario">Valor unitário <b>*</b></label>
                                <input type="number" class="form-control" id="valor-unitario" name="produto[1][valor-unitario]">
                            </div>

                            <div class="col-md-2">
                                <label for="valor-total">Valor total <b>*</b></label>
                                <input type="number" class="form-control" id="valor-total" name="produto[1][valor-total]">
                            </div>

                            <div class="col-md-1">
                                <label for="xxx" class="color-white">x</label>
                                <button class="btn bg-danger" style="float: right;" id="xxx">
                                    <i class="fa fa-trash" style="margin-right: 0;"></i>
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn bg-success" style="float: right; margin-top: 10px">
                                    <i class="fa fa-plus" style="margin-right: 0;"></i>
                                </button>
                            </div>
                        </div>
                        <small class="form-text text-muted">Os campos com <b>*</b> são obrigatórios o preenchimento!</small>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right mt-10" role="group">
                                    <a href="#" class="btn bg-black btn-wide" data-toggle="modal" data-target="#modal-voltar"><i class="fa fa-arrow-left"></i>Voltar</a>
                                    <a href="#" class="btn bg-danger btn-wide" data-toggle="modal" data-target="#modal-limpar"><i class="fa fa-eraser"></i>Limpar</a>
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

<div class="modal fade" id="modal-voltar" tabindex="-1" role="dialog" aria-labelledby="modalVoltarLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalVoltarLabel">Mensagem <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h4>
            </div>
            <div class="modal-body">
                <p>Você tem certeza que deseja retornar para a página de produtos?</p>
            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i>Fechar</button>
                    <a href="/produtos" class="btn btn-success btn-wide btn-rounded"><i class="fa fa-arrow-left"></i>Voltar</a>
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
                    <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i>Fechar</button>
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
                    <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i>Fechar</button>
                    <a href="#" onclick="document.getElementById('form-cadastrar-produto').reset()" data-dismiss="modal" class="btn btn-danger btn-wide btn-rounded"><i class="fa fa-eraser"></i>Limpar</a>
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