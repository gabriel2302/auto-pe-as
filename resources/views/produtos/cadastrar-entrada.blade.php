@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
    <div class="col-md-6">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
            <li><a href="/produtos/entrada">Entradas de produtos</a></li>
            <li class="active">Cadastrar entrada de produtos </li>
        </ul>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h5>Cadastrar entrada de produtos</h5>
                </div>
            </div>
            <div class="panel-body">

                <form class="p-20" action="javascript:void(0)" method="POST" id="form-cadastrar-produto">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" id="url_form" name="url_form" value="{{route('produtos-entrada-cadastrar')}}">
                    <div id="campos-cadastro">
                        <div class="row">
                            <div class="form-group col-md-7">
                                <label for="fornecedor">Nome do fornecedor <b>*</b></label>
                                <input type="text" class="form-control" id="fornecedor" name="fornecedor">
                            </div>

                            <div class="col-md-3 form-group">
                                <label for="nota-fiscal">Número da nota fiscal <b>*</b></label>
                                <input type="text" class="form-control" id="nota-fiscal" name="nota_fiscal">
                            </div>

                            <div class="col-md-2 form-group">
                                <label for="valor-total">Valor total <b>*</b></label>
                                <input type="number" class="form-control" id="valor-total" name="valor_total" min="0.00" step="0.01" readonly>
                            </div>
                        </div>

                        <div id="secao-produtos">
                            <div class="row" id="node_produto_1">
                                <div class="form-group col-md-3">
                                    <label for="produto">Produto <b>*</b></label>
                                    <select class="form-control" id="produto1" name="produto[1][produto_id]">
                                        <option value="">Selecione</option>
                                        @foreach($produtos as $produto)
                                        <option value="{{ $produto->id_produto }}">{{ $produto->nome }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-2">
                                    <label for="quantidade">Quantidade <b>*</b></label>
                                    <input type="number" class="form-control" id="quantidade1" min="0" step="1" name="produto[1][quantidade]" onchange="atualizaValor('quantidade1', 'valor-unitario1', 'valor-total1')">
                                </div>

                                <div class="col-md-2">
                                    <label for="valor-unitario">Valor unitário <b>*</b></label>
                                    <input type="number" class="form-control" id="valor-unitario1" min="0.00" step="0.01" name="produto[1][valor_unitario]" onchange="atualizaValor('quantidade1', 'valor-unitario1', 'valor-total1')">
                                </div>

                                <div class="col-md-2">
                                    <label for="valor-total">Valor total <b>*</b></label>
                                    <input type="number" class="form-control valor-total" id="valor-total1" name="produto[1][valor_total]" onchange="atualizaValorTotal()" readonly>
                                </div>

                                <div class="col-md-2">
                                    <label for="valor-venda">Valor venda <b>*</b></label>
                                    <input type="number" class="form-control" id="valor-venda1" min="0.00" step="0.01" name="produto[1][valor_venda]">
                                    <input type="hidden" name="node_produto[]" value="1">
                                </div>

                                <div class="col-md-1">
                                    <label for="xxx" class="color-white">x</label>
                                    <button class="btn bg-danger" style="float: right;" title="Remover produto" onclick="modalRemover('produto1', 'node_produto_1')">
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
                <p>Você tem certeza que deseja retornar para a página de entrada de produtos sem salvar?</p>
            </div>
            <div class="modal-footer">
                <div class="btn-group" role="group">
                    <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>
                    <a href="/produtos/entrada" class="btn btn-success btn-wide btn-rounded"><i class="fa fa-arrow-left"></i> Voltar</a>
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
                    <a href="#" onclick="document.getElementById('form-cadastrar-produto').reset()" data-dismiss="modal" class="btn btn-danger btn-wide btn-rounded"><i class="fa fa-eraser"></i> Limpar</a>
                </div>
                <!-- /.btn-group -->
            </div>
        </div>
    </div>
</div>

<div id="modal-remover">
</div>

<script>
    function atualizaValor(campo_quantidade, campo_unitario, campo_total) {
        document.getElementById(campo_total).value = (document.getElementById(campo_quantidade).value * document.getElementById(campo_unitario).value).toFixed(2);
        var valor_total = document.getElementsByClassName('valor-total');
        var valor = Number(0.00);
        Array.prototype.forEach.call(valor_total, function(vl){
            valor2 = Number(vl.value);
            valor = valor + valor2;
        });
        document.getElementById('valor-total').value = valor.toFixed(2);
    }

    function atualizaValorTotal() {
        var valor_total = document.getElementsByClassName('valor-total');
        var valor = Number(0.00);
        Array.prototype.forEach.call(valor_total, function(vl){
            valor2 = Number(vl.value);
            valor = valor + valor2;
        });
        document.getElementById('valor-total').value = valor.toFixed(2);
    }

    function adicionaProduto() {
        var id_node = Math.random();
        var produto = '\
        <div class="row" id="node_produto_' + id_node + '">\
            <div class="form-group col-md-3">\
                <label for="produto">Produto <b>*</b></label>\
                <select class="form-control" id="produto' + id_node + '" name="produto[' + id_node + '][produto_id]">\
                    <option value="">Selecione</option>\
                    @foreach($produtos as $produto)\
                    <option value="{{ $produto->id_produto }}">{{ $produto->nome }}</option>\
                    @endforeach\
                </select>\
            </div>\
            \
            <div class="col-md-2">\
                <label for="quantidade">Quantidade <b>*</b></label>\
                <input type="number" class="form-control" id="quantidade' + id_node + '" min="0" step="1" name="produto[' + id_node + '][quantidade]" onchange="atualizaValor(\'quantidade' + id_node + '\', \'valor-unitario' + id_node + '\', \'valor-total' + id_node + '\')">\
            </div>\
            \
            <div class="col-md-2">\
                <label for="valor-unitario">Valor unitário <b>*</b></label>\
                <input type="number" class="form-control" id="valor-unitario' + id_node + '" min="0.00" step="0.01" name="produto[' + id_node + '][valor_unitario]" onchange="atualizaValor(\'quantidade' + id_node + '\', \'valor-unitario' + id_node + '\', \'valor-total' + id_node + '\')">\
            </div>\
            \
            <div class="col-md-2">\
                <label for="valor-total">Valor total <b>*</b></label>\
                <input type="number" class="form-control valor-total" id="valor-total' + id_node + '" name="produto[' + id_node + '][valor_total]" readonly>\
            </div>\
            \
            <div class="col-md-2">\
                <label for="valor-venda">Valor venda <b>*</b></label>\
                <input type="number" class="form-control" id="valor-venda' + id_node + '" min="0.00" step="0.01" name="produto[' + id_node + '][valor_venda]">\
                <input type="hidden" name="node_produto[]" value="' + id_node + '">\
            </div>\
            \
            <div class="col-md-1">\
                <label for="xxx" class="color-white">x</label>\
                <button class="btn bg-danger" style="float: right;" title="Remover produto" onclick="modalRemover(\'produto' + id_node + '\', \'node_produto_' + id_node + '\')">\
                    <i class="fa fa-trash" style="margin-right: 0;"></i>\
                </button>\
            </div>\
        </div>\
        ';
        document.getElementById('secao-produtos').insertAdjacentHTML('beforeend', produto);
    }

    function modalRemover(campo_produto, node_produto) {
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

            $('#btn-cadastrar').html('<i class="fa fa-arrow-right"></i> Cadastrando...');
            var url_atual = document.getElementById('url_form').value;
            var modal_texto = document.getElementById('modal-resposta-texto');

            $.ajax({
                url: "" + url_atual + "",
                method: 'post',
                data: $('#form-cadastrar-produto').serialize(),
                success: function(response) {

                    if (response.resposta == 'cadastrado') {
                        modal_texto.innerHTML = '';
                        modal_texto.innerHTML = 'Entrada de produtos cadastrada com sucesso!';
                        $('#modal-resposta').modal({
                            show: true
                        });
                        document.getElementById("form-cadastrar-produto").reset();
                        $('#btn-cadastrar').html('<i class="fa fa-arrow-right"></i> Cadastrar');
                        window.location.href = "/produtos/entrada";
                    } else {
                        if (response.resposta == 'vazio') {
                            modal_texto.innerHTML = '';
                            modal_texto.innerHTML = 'Por favor, verifique se os campos obrigatórios foram preenchidos!';
                            $('#modal-resposta').modal({
                                show: true
                            });
                            $('#btn-cadastrar').html('<i class="fa fa-arrow-right"></i> Cadastrar');
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
</script>
@stop