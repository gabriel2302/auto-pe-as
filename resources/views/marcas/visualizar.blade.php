@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
    <div class="col-md-6">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
            <li><a href="/clientes">Marcas</a></li>
            <li class="active">Visualizar marca </li>
        </ul>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h5>Visualizar marca</h5>
                </div>
            </div>
            <div class="panel-body">
                @foreach($dados_marcas as $marca)
                <form class="p-20" action="javascript:void(0)" method="POST" id="marca-visualizar">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input type="hidden" id="url_form" name="url_form" value="{{route('clientes-cadastrar')}}">                  
                    <div id="campos-cadastro" >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nome">Nome</label>
                                    <input type="text" class="form-control" value="{{$marca->descricao}}" id="nome" name="nome" readonly>
                                    <input type="hidden" value="{{$marca->id_marca}}" name="id_categoria">
                                </div>
                            </div>
                        </div>    
                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right mt-10" role="group">
                                    <a href="/marcas" class="btn bg-black btn-wide"><i class="fa fa-arrow-left"></i> Voltar</a>
                                    <a href="/marcas/alterar?marca={{$marca->id_marca}}&alterar" type="button" class="btn btn-primary btn-wide" id="btn-cadastrar"><i class="fa fa-arrow-right"></i> Alterar</a>
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