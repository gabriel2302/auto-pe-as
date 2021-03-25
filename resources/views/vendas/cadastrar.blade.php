@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
    <div class="col-md-6">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
            <li><a href="/vendas">Vendas</a></li>
            <li class="active">Efetuar venda</li>
        </ul>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h5>Efetuar venda</h5>
                </div>
            </div>
            <div class="panel-body">

                <form class="p-20" action="javascript:void(0)" method="POST" id="form-cadastrar-produto">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" id="url_form" name="url_form" value="{{route('vendas-efetuar')}}">
                    <div id="campos-cadastro">
                        <div class="row">
                            <input type="hidden" name="usuario_id" value="{{session('usuario_id')}}">
                            <div class="form-group col-md-7">
                                <label for="cliente_id">Cliente</label>
                                <select class="form-control" id="cliente_id" name="cliente_id">
                                    @foreach($clientes as $cliente)
                                    <option value="{{ $cliente->id_cliente }}">{{ $cliente->razao_social }} - CPF/CNPJ: {{ $cliente->cpf_cnpj }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group col-md-2">
                                <label for="desconto">Desconto (%)</label>
                                <input type="number" class="form-control" id="desconto" name="desconto" min="0" max="{{ $desconto->valor }}" step="0.01" onchange="atualizaValorTotal()">
                                </select>
                            </div>

                            <div class="col-md-3 form-group">
                                <label for="valor-total">Valor total da compra</label>
                                <input type="number" class="form-control" id="valor-total" min="0.00" step="0.01" name="valor_total" readonly>
                            </div>
                        </div>
                        <div id="secao-produtos">
                            <div class="row" id="node_produto_1">
                                <div class="form-group col-md-5">
                                    <label for="produto">Produto</label>
                                    <select class="form-control" id="produto1" name="produto[1][produto_id]" onchange="preencheDados('produto1', 'valor-unitario1', 'quantidade1', 'valor-total1')">
                                        <option value="">Selecione</option>
                                        @foreach($produtos as $produto)
                                        <option value="{{ $produto->id_produto }}" data-produto1="{{ $produto->nome }}">{{ $produto->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="quantidade">Quantidade</label>
                                    <input type="number" class="form-control" id="quantidade1" min="1" step="1" name="produto[1][quantidade]" onchange="atualizaValor('valor-total1', 'valor-unitario1', 'quantidade1')" readonly>
                                </div>

                                <div class="col-md-2">
                                    <label for="valor-unitario">Valor unitário</label>
                                    <input type="number" class="form-control" id="valor-unitario1" name="produto[1][valor_unitario]" readonly>
                                </div>

                                <div class="col-md-2">
                                    <label for="valor-total">Valor total</label>
                                    <input type="number" class="form-control valor-total" id="valor-total1" name="produto[1][valor_total]" readonly>
                                    <input type="hidden" name="node_produto[]" value="1">
                                </div>

                                <div class="col-md-1">
                                    <label for="xxx" class="color-white">x</label>
                                    <button class="btn bg-danger" style="float: right;" title="Remover produto" onclick="modalRemover('produto1', 'data-produto1', 'node_produto_1')">
                                        <i class="fa fa-trash" style="margin-right: 0;"></i>
                                    </button>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <button class="btn bg-success" style="float: right; margin-top: 10px" title="Adicionar produto" onclick="adicionaProduto()">
                                    <i class="fa fa-plus" style="margin-right: 0;"></i>
                                </button>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right mt-10" role="group">
                                    <a href="#" class="btn bg-black btn-wide" data-toggle="modal" data-target="#modal-voltar"><i class="fa fa-arrow-left"></i> Voltar</a>
                                    <a href="#" class="btn bg-danger btn-wide" data-toggle="modal" data-target="#modal-limpar"><i class="fa fa-eraser"></i> Limpar</a>
                                    <button type="button" class="btn btn-primary btn-wide" id="btn-cadastrar"><i class="fa fa-arrow-right"></i> Efetuar</button>
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
                <p>Você tem certeza que deseja cancelar essa venda e retornar para a página de vendas?</p>
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

<div id="modal-remover">

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
                    <a href="#" onclick="document.getElementById('form-cadastrar-produto').reset()" data-dismiss="modal" class="btn btn-danger btn-wide btn-rounded"><i class="fa fa-eraser"></i> Limpar</a>
                </div>
                <!-- /.btn-group -->
            </div>
        </div>
    </div>
</div>

<script>
    function preencheDados(campo_produto, campo_valor, campo_quantidade, campo_total) {
        var id_produto = document.getElementById(campo_produto).value;

        if (id_produto == '') {
            document.getElementById(campo_valor).value = '';
            document.getElementById(campo_total).value = '';
            document.getElementById(campo_quantidade).value = '';
            document.getElementById(campo_quantidade).setAttribute('readonly', 'true');
        } else {
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
                    document.getElementById(campo_valor).value = '';
                    document.getElementById(campo_total).value = '';
                    document.getElementById(campo_quantidade).value = '';

                    document.getElementById(campo_valor).value = data.info_produto[0]['valor'];
                    document.getElementById(campo_quantidade).setAttribute('max', data.info_produto[0]['quantidade']);
                    document.getElementById(campo_quantidade).removeAttribute('readonly');
                },
                error: function(response) {}
            });
        }
    }

    function atualizaValor(campo_total, campo_unitario, campo_quantidade) {
        document.getElementById(campo_total).value = (document.getElementById(campo_quantidade).value * document.getElementById(campo_unitario).value).toFixed(2)
        var valor_total = document.getElementsByClassName('valor-total');
        var valor = Number(0.00);
        Array.prototype.forEach.call(valor_total, function(vl) {
            valor2 = Number(vl.value);
            valor = valor + valor2;
        });
        if (document.getElementById('desconto').value != '' || document.getElementById('desconto').value > 0) {
            desconto = (Number(document.getElementById('desconto').value)) / 100;
            valor_com_desconto = valor - (valor.toFixed(2) * desconto);
            document.getElementById('valor-total').value = valor_com_desconto.toFixed(2);
        } else {
            document.getElementById('valor-total').value = valor.toFixed(2);
        }
    }

    function atualizaValorTotal() {
        var valor_total = document.getElementsByClassName('valor-total');
        var valor = Number(0.00);
        Array.prototype.forEach.call(valor_total, function(vl) {
            valor2 = Number(vl.value);
            valor = valor + valor2;
        });

        if (document.getElementById('desconto').value != '' || document.getElementById('desconto').value > 0) {
            desconto = (Number(document.getElementById('desconto').value)) / 100;
            valor_com_desconto = valor - (valor.toFixed(2) * desconto);
            document.getElementById('valor-total').value = valor_com_desconto.toFixed(2);
        } else {
            document.getElementById('valor-total').value = valor.toFixed(2);
        }
    }

    function adicionaProduto() {
        var id_node = Math.random();
        var produto = '\
        <div class="row" id="node_produto_' + id_node + '">\
            <div class="form-group col-md-5">\
                <label for="produto">Produto</label>\
                <select class="form-control" id="produto' + id_node + '" name="produto[' + id_node + '][produto_id]" onchange="preencheDados(\'produto' + id_node + '\', \'valor-unitario' + id_node + '\', \'quantidade' + id_node + '\', \'valor-total' + id_node + '\')">\
                    <option value="">Selecione</option>\
                    @foreach($produtos as $produto)\
                    <option value="{{ $produto->id_produto }}" data-produto' + id_node + '="{{ $produto->nome }}">{{ $produto->nome }}</option>\
                    @endforeach\
                </select>\
            </div>\
\
            <div class="col-md-2">\
                <label for="quantidade">Quantidade</label>\
                <input type="number" class="form-control" id="quantidade' + id_node + '" min="1" step="1" name="produto[' + id_node + '][quantidade]" onchange="atualizaValor(\'valor-total' + id_node + '\', \'valor-unitario' + id_node + '\', \'quantidade' + id_node + '\')" readonly>\
            </div>\
\
            <div class="col-md-2">\
                <label for="valor-unitario">Valor unitário</label>\
                <input type="number" class="form-control" id="valor-unitario' + id_node + '" name="produto[' + id_node + '][valor-unitario]" readonly>\
            </div>\
\
            <div class="col-md-2">\
                <label for="valor-total">Valor total</label>\
                <input type="number" class="form-control valor-total" id="valor-total' + id_node + '" name="produto[' + id_node + '][valor-total]" readonly>\
                <input type="hidden" name="node_produto[]" value="' + id_node + '">\
            </div>\
\
            <div class="col-md-1">\
                <label for="xxx" class="color-white">x</label>\
                <button class="btn bg-danger" style="float: right;" title="Remover produto" onclick="modalRemover(\'produto' + id_node + '\', \'data-produto' + id_node + '\', \'node_produto_' + id_node + '\')">\
                    <i class="fa fa-trash" style="margin-right: 0;"></i>\
                </button>\
            </div>\
        </div>\
        ';
        document.getElementById('secao-produtos').insertAdjacentHTML('beforeend', produto);
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

            $('#btn-cadastrar').html('<i class="fa fa-arrow-right"></i> Efetuando...');
            var url_atual = document.getElementById('url_form').value;
            var modal_texto = document.getElementById('modal-resposta-texto');

            $.ajax({
                url: "" + url_atual + "",
                method: 'post',
                data: $('#form-cadastrar-produto').serialize(),
                success: function(response) {

                    if (response.resposta == 'cadastrado') {
                        modal_texto.innerHTML = '';
                        modal_texto.innerHTML = 'Venda efetuada com sucesso! Por favor, peça para o cliente dirigir-se ao caixa e finalizar o pagamento.';
                        $('#modal-resposta').modal({
                            show: true
                        });
                        document.getElementById("form-cadastrar-produto").reset();
                        $('#btn-cadastrar').html('<i class="fa fa-arrow-right"></i> Efetuar');
                        window.location.href = "/vendas";
                    } else {
                        if (response.resposta == 'vazio') {
                            modal_texto.innerHTML = '';
                            modal_texto.innerHTML = 'Por favor, verifique se todos os campos estão preenchidos!';
                            $('#modal-resposta').modal({
                                show: true
                            });
                            $('#btn-cadastrar').html('<i class="fa fa-arrow-right"></i> Efetuar');
                        } else {
                            if (response.resposta == 'desconto_maior') {
                                modal_texto.innerHTML = '';
                                modal_texto.innerHTML = 'Desculpe, mas não é possível utilizar desconto maior que o permitido!';
                                $('#modal-resposta').modal({
                                    show: true
                                });
                                $('#btn-cadastrar').html('<i class="fa fa-arrow-right"></i> Efetuar');
                            } else {
                                if (response.resposta == 'produto_vazio') {
                                    modal_texto.innerHTML = '';
                                    modal_texto.innerHTML = 'Por favor, verifique se ao menos um produto está selecionado e seus campos estão todos preenchidos para efetuar a venda!';
                                    $('#modal-resposta').modal({
                                        show: true
                                    });
                                    $('#btn-cadastrar').html('<i class="fa fa-arrow-right"></i> Efetuar');
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
                    $('#btn-cadastrar').html('<i class="fa fa-arrow-right"></i> Efetuar');
                }
            });
        });
    });
</script>
@stop