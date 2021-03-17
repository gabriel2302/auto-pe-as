@extends('base/layout')

@section('conteudo')
<br>
<div class="row">
    @if(session('usuario_funcao_id')=='1')
    <div class="col-md-3">
        <a class="dashboard-stat bg-secondary" href="/categorias">
            <span class="number counter">{{$numero_categorias}}</span>
            <span class="name">Categorias</span>
            <span class="bg-icon"><i class="fa fa-tag"></i></span>
        </a>
    </div>
    @endif

    @if(session('usuario_funcao_id')=='1' || session('usuario_funcao_id')=='2')
    <div class="col-md-3">
        <a class="dashboard-stat bg-primary" href="/clientes">
            <span class="number counter">{{$numero_clientes}}</span>
            <span class="name">Clientes</span>
            <span class="bg-icon"><i class="fa fa-users"></i></span>
        </a>
    </div>
    @endif

    @if(session('usuario_funcao_id')=='1')
    <div class="col-md-3">
        <a class="dashboard-stat bg-success" href="/marcas">
            <span class="number counter">{{$numero_marcas}}</span>
            <span class="name">Marcas</span>
            <span class="bg-icon"><i class="fa fa-copyright"></i></span>
        </a>
    </div>
    @endif

    @if(session('usuario_funcao_id')=='1' || session('usuario_funcao_id')=='2')
    <div class="col-md-3">
        <a class="dashboard-stat bg-warning" href="/produtos">
            <span class="number counter">{{$numero_produtos}}</span>
            <span class="name">Produtos</span>
            <span class="bg-icon"><i class="fa fa-cart-plus"></i></span>
        </a>
    </div>
    @endif
</div>
@stop