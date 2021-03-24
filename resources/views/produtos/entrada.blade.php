@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
  <div class="col-md-6">
    <ul class="breadcrumb">
      <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
      <li class="active">Entrada de produtos</li>
    </ul>
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-heading">
        <div class="panel-title">
          <h5>Entrada de produtos</h5>
        </div>
        <br>
        <div class="row">
          <div class="col-md-12 form-group">
            <a class="btn btn-primary" href="/produtos/cadastrar-entrada">Cadastrar </a>
          </div>
        </div>
      </div>

      <div class="panel-body">
        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Data da entrada</th>
              <th>Fornecedor</th>
              <th>Nota fiscal</th>
              <th>Valor</th>
              <th width="40px">Opções</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Data da entrada</th>
              <th>Fornecedor</th>
              <th>Nota fiscal</th>
              <th>Valor</th>
              <th width="40px">Opções</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($entradas as $entrada)
            <tr>
              <td>{{date('d/m/Y', strtotime($entrada->data_entrada))}}</td>
              <td>{{$entrada->fornecedor}}</td>
              <td>{{$entrada->nota_fiscal}}</td>
              <td>{{$entrada->valor_total}}</td>
              <td>
                <a class="btn bg-black" href="/produtos/visualizar-entrada?entrada={{$entrada->id_entrada}}" title="Visualizar"><i class="fa fa-eye"></i></a>
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        <style>
          .btn .fa {
              margin-right: 0;
          }
          .dt-buttons{
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
                  title: 'Relatório de entrada de produtos',
                  text: '<i title="Imprimir" class="fa fa-print"></i> Emitir relatório',
                  className: 'btn btn-primary',
                  orientation: 'landscape',
                  exportOptions: {
                    modifier: {
                      page: 'current'
                    },
                    columns: [0, 1, 2, 3]
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