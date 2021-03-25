@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
    <div class="col-md-6">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
            <li><a href="/vendas">Vendas</a></li>
            <li class="active">Finalizar venda</li>
        </ul>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h5>Finalizar venda</h5>
                </div>
            </div>
            <div class="panel-body">

                <form class="p-20" action="javascript:void(0)" method="POST" id="form-cadastrar-produto">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" id="url_form" name="url_form" value="{{route('vendas-finalizar')}}">
                    @foreach($vendas as $venda)
                    <input type="hidden" id="id_venda" name="id_venda" value="{{$venda->id_venda}}">
                    <div id="campos-cadastro">
                        <div class="row">
                            <div class="form-group col-md-9">
                                <label for="cliente_id">Cliente</label>
                                <select class="form-control" id="cliente_id" name="cliente_id" readonly>
                                    @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id_cliente }}" {{ $cliente->id_cliente==$venda->cliente_id?'selected':'' }}>{{ $cliente->razao_social }} - CPF/CNPJ: {{ $cliente->cpf_cnpj }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="forma-pagamento">Forma de pagamento</label>
                                <select class="form-control" id="forma-pagamento" name="forma_pagamento" onchange="verificaPagamento()">
                                    <option value="">Selecione</option>
                                    <option value="credito">Cartão de crédito</option>
                                    <option value="debito">Cartão de débito</option>
                                    <option value="interno">Crédito interno</option>
                                    <option value="dinheiro">Dinheiro</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label>Desconto (%)</label>
                                <input type="number" class="form-control" value="{{$venda->desconto}}" readonly>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="valor-total">Valor total da compra</label>
                                <input type="number" class="form-control" id="valor-total" min="0.00" step="0.01" name="valor_total" value="{{$venda->valor_total}}" readonly>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="valor-recebido">Valor recebido</label>
                                <input type="number" class="form-control" id="valor-recebido" min="{{$venda->valor_total}}" step="0.01" name="valor_recebido" onchange="atualizaTroco()" readonly>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="troco">Troco</label>
                                <input type="number" class="form-control" id="troco" min="0.00" step="0.01" name="troco" readonly>
                            </div>
                        </div>
                        <div id="secao-produtos">
                            @foreach($vendas_produtos as $venda_produto)
                            <div class="row">
                                <div class="form-group col-md-6">
                                    <label>Produto</label>
                                    <select class="form-control" disabled>
                                        <option value="">Selecione</option>
                                        @foreach($produtos as $produto)
                                        <option value="{{ $produto->id_produto }}" {{ $produto->id_produto==$venda_produto->produto_id?'selected':'' }}>{{ $produto->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label>Quantidade</label>
                                    <input type="number" class="form-control" value="{{$venda_produto->quantidade}}" readonly>
                                </div>

                                <div class="col-md-2">
                                    <label>Valor unitário</label>
                                    <input type="number" class="form-control" value="{{$venda_produto->valor_unitario}}" readonly>
                                </div>

                                <div class="col-md-2">
                                    <label>Valor total</label>
                                    <input type="number" class="form-control valor-total" value="{{$venda_produto->valor_total}}" readonly>
                                </div>
                            </div>
                            @endforeach
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right mt-10" role="group">
                                    <a href="#" class="btn bg-black btn-wide" data-toggle="modal" data-target="#modal-voltar"><i class="fa fa-arrow-left"></i> Voltar</a>
                                    <a href="#" class="btn bg-danger btn-wide" data-toggle="modal" data-target="#modal-limpar"><i class="fa fa-eraser"></i> Limpar</a>
                                    <button type="button" class="btn btn-primary btn-wide" id="btn-cadastrar"><i class="fa fa-arrow-right"></i> Finalizar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
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
                <p>Você tem certeza que deseja retornar para a página de vendas sem finalizar essa venda?</p>
            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                    <a href="/vendas" class="btn btn-success btn-wide btn-rounded"><i class="fa fa-arrow-left"></i> Voltar</a>
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
                    <a href="#" onclick="limparCampos()" data-dismiss="modal" class="btn btn-danger btn-wide btn-rounded"><i class="fa fa-eraser"></i> Limpar</a>
                </div>
                <!-- /.btn-group -->
            </div>
        </div>
    </div>
</div>

<script>
    function limparCampos() {
        document.getElementById('forma-pagamento').value = '';
        document.getElementById('valor-recebido').value = '';
        document.getElementById('troco').value = '';

        document.getElementById('valor-recebido').setAttribute('readonly', 'true');
        document.getElementById('troco').setAttribute('readonly', 'true');
    }

    function verificaPagamento() {
        var cliente_id = document.getElementById('cliente_id').value;
        var forma_pagamento = document.getElementById('forma-pagamento').value;
        var valor_total = document.getElementById('valor-total').value;

        if (forma_pagamento == '') {
            document.getElementById('valor-recebido').value = '';
            document.getElementById('troco').value = '';

            document.getElementById('valor-recebido').setAttribute('readonly', 'true');
            document.getElementById('troco').setAttribute('readonly', 'true');
        } else if (forma_pagamento == 'credito' || forma_pagamento == 'debito') {
            document.getElementById('valor-recebido').value = document.getElementById('valor-total').value;
            document.getElementById('troco').value = '0,00';

            document.getElementById('valor-recebido').setAttribute('readonly', 'true');
            document.getElementById('troco').setAttribute('readonly', 'true');
        } else if (forma_pagamento == 'interno') {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                url: "/clientes/info_cliente",
                method: 'post',
                data: {
                    'id_cliente': cliente_id,
                },
                success: function(dados) {
                    var data = JSON.parse(dados);
                    if (Number(valor_total) > Number(data.clientes[0]['credito'])) {
                        var modal_texto = document.getElementById('modal-resposta-texto');
                        modal_texto.innerHTML = '';
                        modal_texto.innerHTML = 'Desculpe, mas esse cliente possui apenas R$ ' + data.clientes[0]['credito'] + ' disponível para compras a prazo! Por favor, selecione outra forma de pagamento.';

                        document.getElementById('forma-pagamento').value = '';
                        document.getElementById('valor-recebido').value = '';
                        document.getElementById('troco').value = '';

                        document.getElementById('valor-recebido').setAttribute('readonly', 'true');
                        document.getElementById('troco').setAttribute('readonly', 'true');

                        $('#modal-resposta').modal({
                            show: true
                        });

                    } else {
                        document.getElementById('valor-recebido').value = document.getElementById('valor-total').value;
                        document.getElementById('troco').value = '0,00';

                        document.getElementById('valor-recebido').setAttribute('readonly', 'true');
                        document.getElementById('troco').setAttribute('readonly', 'true');
                    }



                },
                error: function(response) {}
            });
        } else if (forma_pagamento == 'dinheiro') {
            document.getElementById('valor-recebido').value = '';
            document.getElementById('troco').value = '';

            document.getElementById('valor-recebido').removeAttribute('readonly');
            document.getElementById('troco').setAttribute('readonly', 'true');
        }
    }

    function atualizaTroco() {
        var valor_total = Number(document.getElementById('valor-total').value);
        var valor_recebido = Number(document.getElementById('valor-recebido').value);

        if (valor_recebido < valor_total) {
            var modal_texto = document.getElementById('modal-resposta-texto');
            modal_texto.innerHTML = '';
            modal_texto.innerHTML = 'O valor recebido não pode ser menor que o valor da compra!';
            document.getElementById('valor-recebido').value = document.getElementById('valor-total').value;
            document.getElementById('troco').value = '0,00';
            $('#modal-resposta').modal({
                show: true
            });
        } else {
            document.getElementById('troco').value = ((valor_recebido) - (valor_total)).toFixed(2);
        }
    }

    function modalRemover(campo_produto, nome_produto, node_produto) {
        var id_produto = document.getElementById(campo_produto).value;
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });

        $.ajax({
            url: "/produtos/info_produto",
            method: 'post',
            data: {
                'id_produto': id_produto,
            },
            success: function(dados) {
                var data = JSON.parse(dados);
                if (typeof(data.info_produto[0]) != "undefined") {
                    var produto = data.info_produto[0]['nome'];

                } else {
                    var produto = "";
                }

                var modal = '\
                                <div class="modal fade" id="modal-remove" tabindex="-1" role="dialog" aria-labelledby="modalremoveLabel">\
                                    <div class="modal-dialog" role="document">\
                                        <div class="modal-content">\
                                            <div class="modal-header">\
                                                <h4 class="modal-title" id="modalLimparLabel">Mensagem <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h4>\
                                            </div>\
                                            <div class="modal-body">\
                                                <p>Você tem certeza que deseja excluir o produto <b>' + produto + '</b>?</p>\
                                            </div>\
                                            <div class="modal-footer">\
                                                <div class="btn-group" role="group">\
                                                    <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i>Fechar</button>\
                                                    <a href="#" onclick="document.getElementById(\'' + node_produto + '\').remove(); atualizaValorTotal();" data-dismiss="modal" class="btn btn-danger btn-wide btn-rounded"><i class="fa fa-trash"></i>Remover</a>\
                                                </div>\
                                                <!-- /.btn-group -->\
                                            </div>\
                                        </div>\
                                    </div>\
                                </div>\
                                ';
                document.getElementById('modal-remover').innerHTML = modal;
                $('#modal-remove').modal({
                    show: true
                });

            },
            error: function(response) {}
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

            var forma_pagamento = document.getElementById('forma-pagamento').value;
            if (forma_pagamento == '') {
                var modal_texto = document.getElementById('modal-resposta-texto');
                modal_texto.innerHTML = '';
                modal_texto.innerHTML = 'É necessário selecionar uma forma de pagamento para finalizar a venda!';
                $('#modal-resposta').modal({
                    show: true
                });
            } else {
                var valor_total = Number(document.getElementById('valor-total').value);
                var valor_recebido = Number(document.getElementById('valor-recebido').value);

                if (valor_recebido < valor_total) {
                    var modal_texto = document.getElementById('modal-resposta-texto');
                    modal_texto.innerHTML = '';
                    modal_texto.innerHTML = 'O valor recebido não pode ser menor que o valor da compra!';
                    $('#modal-resposta').modal({
                        show: true
                    });
                } else {
                    $('#btn-cadastrar').html('<i class="fa fa-arrow-right"></i> Finalizando...');
                    var url_atual = document.getElementById('url_form').value;
                    var modal_texto = document.getElementById('modal-resposta-texto');

                    $.ajax({
                        url: "" + url_atual + "",
                        method: 'post',
                        data: $('#form-cadastrar-produto').serialize(),
                        success: function(response) {

                            if (response.resposta == 'cadastrado') {
                                modal_texto.innerHTML = '';
                                modal_texto.innerHTML = 'Venda finalizada com sucesso!';
                                $('#modal-resposta').modal({
                                    show: true
                                });
                                document.getElementById("form-cadastrar-produto").reset();
                                $('#btn-cadastrar').html('<i class="fa fa-arrow-right"></i> Finalizar');
                                window.location.href = "/vendas";
                            }
                        },
                        error: function(response) {
                            modal_texto.innerHTML = '';
                            modal_texto.innerHTML = 'Erro: ' + response.responseJSON.message;
                            $('#modal-resposta').modal({
                                show: true
                            });
                            $('#btn-cadastrar').html('<i class="fa fa-arrow-right"></i> Finalizar');
                        }
                    });

                }
            }
        });
    });
</script>
@stop