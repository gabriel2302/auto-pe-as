@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
    <div class="col-md-6">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
            <li><a href="/produtos/entrada">Entradas de produtos</a></li>
            <li class="active">Visualizar entrada de produtos </li>
        </ul>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h5>Visualizar entrada de produtos</h5>
                </div>
            </div>
            <div class="panel-body">
                @foreach($entradas as $entrada)
                <div id="campos-cadastro">
                    <div class="row">
                        <div class="form-group col-md-7">
                            <label for="fornecedor">Nome do fornecedor</label>
                            <input type="text" class="form-control" id="fornecedor" name="fornecedor" value="{{$entrada->fornecedor}}" readonly>
                        </div>

                        <div class="col-md-3 form-group">
                            <label for="nota-fiscal">Número da nota fiscal</label>
                            <input type="text" class="form-control" id="nota-fiscal" name="nota_fiscal" value="{{$entrada->nota_fiscal}}" readonly>
                        </div>

                        <div class="col-md-2 form-group">
                            <label for="valor-total">Valor total</label>
                            <input type="number" class="form-control" value="{{$entrada->valor_total}}" readonly>
                        </div>
                    </div>

                    <div id="secao-produtos">
                        @foreach($itens_entrada as $item)
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="produto">Produto</label>
                                <select class="form-control" disabled>
                                    <option value="">Selecione</option>
                                    @foreach($produtos as $produto)
                                    <option value="{{ $produto->id_produto }}" {{$produto->id_produto==$item->produto_id?'selected':''}}>{{ $produto->nome }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-2">
                                <label for="quantidade">Quantidade</label>
                                <input type="number" class="form-control" value="{{$item->quantidade}}" readonly>
                            </div>

                            <div class="col-md-2">
                                <label for="valor-unitario">Valor unitário</label>
                                <input type="number" class="form-control" value="{{$item->valor_unitario}}" readonly>
                            </div>

                            <div class="col-md-2">
                                <label for="valor-total">Valor total</label>
                                <input type="number" class="form-control valor-total" value="{{$item->valor_total}}" readonly>
                            </div>

                            <div class="col-md-2">
                                <label for="valor-venda">Valor venda</label>
                                <input type="number" class="form-control" value="{{$item->valor_venda}}" readonly>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-group pull-right mt-10" role="group">
                                <a href="/produtos/entrada/" class="btn bg-black btn-wide"><i class="fa fa-arrow-left"></i>Voltar</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop