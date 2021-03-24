@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
    <div class="col-md-6">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
            <li><a href="/clientes">Produtos</a></li>
            <li class="active">Visualizar produto </li>
        </ul>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h5>Visualizar produto</h5>
                </div>
            </div>
            <div class="panel-body">
                @foreach($produtos as $produto)
                <form class="p-20" action="javascript:void(0)" method="POST" id="form-cadastrar-cliente">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" id="url_form" name="url_form" value="{{route('clientes-cadastrar')}}">
                    <div id="campos-cadastro">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" value="{{$produto->nome}}" id="nome" name="nome" readonly>
                                    <input type="hidden" value="{{$produto->id_produto}}" name="id_produto">
                                </div>
                            </div>
                            <div class="col-md-2">
                                <label for="numero">Valor</label>
                                <input type="number" readonly min="0.00" step="0.01" class="form-control" value="{{$produto->valor}}" id="valor" name="valor">
                            </div>
                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="complemento">Categoria</label>
                                    <select class="form-control" id="categoria" name="categoria" disabled>
                                        <option value="">Selecione</option>
                                        @foreach($categorias as $categoria)
                                        <option value="{{ $categoria->id_categoria }}" {{$categoria->id_categoria==$produto->categoria_id?'selected':''}}>{{ $categoria->descricao }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-md-2">
                                <div class="form-group">
                                    <label for="marca">Marca <b></b></label>
                                    <select class="form-control" id="marca" name="marca" disabled>
                                        <option value="">Selecione</option>
                                        @foreach($marcas as $marca)
                                        <option value="{{ $marca->id_marca }}" {{$marca->id_marca==$produto->marca_id?'selected':''}}>{{ $marca->descricao }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="cep">Descrição</label>
                                    <textarea class="form-control" cols="1" rows="3" disabled>{{$produto->descricao}}</textarea>
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right mt-10" role="group">
                                    <a href="/produtos" class="btn bg-black btn-wide"><i class="fa fa-arrow-left"></i> Voltar</a>
                                    <a href="/produtos/alterar?produto={{$produto->id_produto}}&alterar" class="btn btn-primary btn-wide"><i class="fa fa-arrow-right"></i> Alterar</a>
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
@stop