@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
    <div class="col-md-6">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
            <li><a href="/clientes">Visualizar venda</a></li>
            <li class="active">Visualizar venda</li>
        </ul>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h5>Visualizar venda</h5>
                </div>
            </div>
            <div class="panel-body">
            @foreach($dados_vendas as $dados_venda)
                <form class="p-20" action="javascript:void(0)" method="POST" id="form-cadastrar-produto">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" id="url_form" name="url_form" value="{{route('produtos-cadastrar')}}">
                    <div id="campos-cadastro">
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="produto">Cliente <b>*</b></label>
                                <select class="form-control" id="produto" name="produto[1][produto_id]" disabled>
                                    <option value="">Selecione</option>
                                    @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id_cliente }}" {{ $cliente->id_cliente == $dados_venda->cliente_id ? 'selected' : '' }}>{{ $cliente->razao_social }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="pagamento">Forma de pagamento<b>*</b></label>
                                <select class="form-control" id="pagamento" name="pagamento" disabled>
                                    <option value="credito" {{ $dados_venda->forma_pagamento == 'credito'? 'selected' : '' }}>Cartão de crédito</option>
                                    <option value="debito" {{ $dados_venda->forma_pagamento == 'debito'? 'selected' : '' }}>Cartão de débito</option>
                                    <option value="interno" {{ $dados_venda->forma_pagamento == 'interno'? 'selected' : '' }}>Crédito interno</option>
                                    <option value="dinheiro" {{ $dados_venda->forma_pagamento == 'dinheiro'? 'selected' : '' }}>Dinheiro</option>
                                </select>
                            </div>

                            <div class="form-group col-md-3">
                                <label for="desconto">Desconto <b>*</b></label>
                                <input type="number" disabled class="form-control" id="desconto"  value="{{ $dados_venda->desconto }}" name="desconto" max="{{ $desconto->valor }}" step="0.01">
                                </select>
                            </div>

                            <div class="col-md-2 form-group">
                                <label for="valor-total">Valor total da compra <b>*</b></label>
                                <input type="text" disabled class="form-control" id="valor-total" value="{{ $dados_venda->valor_total }}" name="valor-total">
                            </div>
                        </div>
                    @foreach($dados_vendas_produtos as $dados_vendas_produto )
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="produto">Produto <b>*</b></label>
                                <select class="form-control" disabled id="produto" name="produto[1][produto_id]">
                                    <option value="">Selecione</option>
                                    @foreach($produtos as $produto)
                                    <option value="{{ $produto->id_produto }}" {{ $produto->id_produto == $dados_vendas_produto->produto_id ? 'selected' : '' }}>{{ $produto->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-3">
                                <label for="quantidade">Quantidade <b>*</b></label>
                                <input type="number" disabled class="form-control" id="quantidade" name="produto[1][quantidade]" value="{{ $dados_vendas_produto->quantidade }}">
                            </div>

                            <div class="col-md-3">
                                <label for="valor-unitario">Valor unitário <b>*</b></label>
                                <input type="number" disabled class="form-control" id="valor-unitario" name="produto[1][valor-unitario]"  value="{{ $dados_vendas_produto->valor_unitario }}">
                            </div>

                            <div class="col-md-2">
                                <label for="valor-total">Valor total <b>*</b></label>
                                <input type="number" disabled class="form-control" id="valor-total" name="produto[1][valor-total]" value="{{ $dados_vendas_produto->valor_total }}">
                            </div>
                        </div>
                    @endforeach

                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right mt-10" role="group">
                                    <a href="#" class="btn bg-black btn-wide" data-toggle="modal" data-target="#modal-voltar"><i class="fa fa-arrow-left"></i>Voltar</a>
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