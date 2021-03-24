@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
    <div class="col-md-6">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
            <li class="active">Comissões dos vendedores</li>
        </ul>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h5>Comissões dos vendedores</h5>
                </div>
            </div>

            <div class="panel-body">
                <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Data venda</th>
                            <th>Vendedor</th>
                            <th>CPF</th>
                            <th>% da comissão</th>
                            <th>Valor comissão</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Data venda</th>
                            <th>Vendedor</th>
                            <th>CPF</th>
                            <th>% da comissão</th>
                            <th>Valor comissão</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach($vendas as $venda)
                        <tr>
                            <td>{{date('d/m/Y', strtotime($venda->data_venda))}}</td>
                            @foreach($usuarios as $usuario)
                            @if($usuario->id_usuario==$venda->usuario_id)
                            <td>{{$usuario->nome}}</td>
                            <td>{{$usuario->cpf}}</td>
                            @endif
                            @endforeach
                            <td>{{$venda->comissao}} %</td>
                            <td>R$ {{$venda->valor_comissao}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

                <style>
                    .btn .fa {
                        margin-right: 0;
                    }

                    .dt-buttons {
                        margin-bottom: 10px;
                    }
                </style>


                <!-- ========== JS ========== -->
                <script type="text/javascript">
                    $(document).ready(function() {
                        $('#example').DataTable({
                            dom: "<'row'<'col-md-12 text-right pb-2'B>>\
                                    <'row'<'col-md-6'l><'col-md-6'f>>\
                                    <'row'<'col-md-12'rt>>\
                                    <'row'<'col-md-6'i><'col-md-6'p>>",
                            buttons: [{
                                    extend: 'print',
                                    title: 'Relatório de comissões dos vendedores',
                                    text: '<i title="Imprimir" class="fa fa-print"></i> Emitir relatório',
                                    className: 'btn btn-primary',
                                    orientation: 'landscape',
                                    exportOptions: {
                                        modifier: {
                                            page: 'current'
                                        },
                                        columns: [0, 1, 2, 3, 4]
                                    },
                                },

                            ],
                            "lengthMenu": [
                                [10, 25, 50, -1],
                                [10, 25, 50, "Todos"]
                            ],
                            "order": [1, "desc"]
                        });
                    });
                </script>

            </div>
        </div>
    </div>
</div>
@stop