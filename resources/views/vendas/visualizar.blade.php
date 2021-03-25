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
                <form class="p-20" action="javascript:void(0)" method="POST" id="form-cadastrar-produto">
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
                                <label>Situação</label>
                                @if($venda->status=='1')
                                <input type="text" class="form-control" value="Finalizada" readonly>
                                @else
                                <input type="text" class="form-control" value="Cancelada" readonly>
                                @endif
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-3">
                                <label for="forma-pagamento">Forma de pagamento</label>
                                @if($venda->forma_pagamento=='credito')
                                <input type="text" class="form-control" value="Cartão de crédito" readonly>
                                @elseif($venda->forma_pagamento=='debito')
                                <input type="text" class="form-control" value="Cartão de débito" readonly>
                                @elseif($venda->forma_pagamento=='interno')
                                <input type="text" class="form-control" value="Crédito interno" readonly>
                                @else
                                <input type="text" class="form-control" value="Dinheiro" readonly>
                                @endif
                            </div>
                            <div class="form-group col-md-3">
                                <label>Desconto (%)</label>
                                <input type="number" class="form-control" value="{{$venda->desconto}}" readonly>
                                </select>
                            </div>
                            <div class="col-md-3 form-group">
                                <label for="valor-total">Valor total da compra</label>
                                <input type="number" class="form-control" id="valor-total" min="0.00" step="0.01" name="valor_total" value="{{$venda->valor_total}}" readonly>
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
                                    <a href="/vendas" class="btn bg-black btn-wide" ><i class="fa fa-arrow-left"></i> Voltar</a>
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
@stop