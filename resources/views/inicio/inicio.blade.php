@extends('base/layout')

@section('conteudo')
<br>
<div class="row">
    <div class="col-md-3">
        <a class="dashboard-stat bg-primary" href="/clientes">
            <span class="number counter">{{$numero_clientes}}</span>
            <span class="name">Clientes</span>
            <span class="bg-icon"><i class="fa fa-users"></i></span>
        </a>
    </div>

    <div class="col-md-3">
        <a class="dashboard-stat bg-success" href="/produtos">
            <span class="number counter">{{$numero_produtos}}</span>
            <span class="name">Produtos</span>
            <span class="bg-icon"><i class="fa fa-cart-plus"></i></span>
        </a>
    </div>
</div>
@stop