@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
    <div class="col-md-6">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
            <li><a href="/categorias">Categorias</a></li>
            <li class="active">Visualizar categoria</li>
        </ul>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h5>Visualizar categoria</h5>
                </div>
            </div>
            <div class="panel-body">
                @foreach($dados_categorias as $categoria)
                <form class="p-20" action="javascript:void(0)" method="POST" id="categoria-visualizar">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" id="url_form" name="url_form" value="{{route('clientes-cadastrar')}}">                  
                    <div id="campos-cadastro" >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" value="{{$categoria->descricao}}" id="nome" name="nome" readonly>
                                    <input type="hidden" value="{{$categoria->id_categoria}}" name="id_categoria">
                                </div>
                            </div>
                        </div>    

                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right mt-10" role="group">
                                    <a href="/categorias" class="btn bg-black btn-wide"><i class="fa fa-times"></i>Voltar</a href="/categoria">
                                    <a href="/categorias/alterar?categoria={{$categoria->id_categoria}}&alterar" type="button" class="btn btn-primary btn-wide" id="btn-cadastrar"><i class="fa fa-arrow-right"></i>Alterar</a>
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