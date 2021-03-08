@extends('base/layout')

@section('conteudo')
<br>
<div class="row">
    <div class="col-md-3">
        <a class="dashboard-stat bg-primary" href="#">
            <span class="number counter">{{$numero_clientes}}</span>
            <span class="name">Clientes</span>
            <span class="bg-icon"><i class="fa fa-users"></i></span>
        </a>
    </div>
</div>
@stop