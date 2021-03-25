@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
  <div class="col-md-6">
    <ul class="breadcrumb">
      <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
      <li class="active">Vendas</li>
    </ul>
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-heading">
        <div class="panel-title">
          <h5>Vendas</h5>
        </div>
        <br>
        @if(session('usuario_funcao_id')=='1' || session('usuario_funcao_id')=='2')
        <div class="row">
          <div class="col-md-12 form-group">
            <a class="btn btn-primary" href="/vendas/efetuar">Efetuar nova venda</a>
          </div>
        </div>
        @endif
      </div>

      <div class="panel-body">
        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th width="120px">Data da venda</th>
              <th>Cliente</th>
              <th>Valor</th>
              <th>Situação</th>
              <th width="80px">Opções</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th width="120px">Data da venda</th>
              <th>Cliente</th>
              <th>Valor</th>
              <th>Situação</th>
              <th width="80px">Opções</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($vendas as $venda)
            <tr>
              <td>{{date('d/m/Y', strtotime($venda->data_venda))}}</td>
              @foreach($clientes as $cliente)
              @if($cliente->id_cliente == $venda->cliente_id)
              <td>{{$cliente->razao_social}}</td>
              @endif
              @endforeach
              <td>{{$venda->valor_total}}</td>
              <td>
                @if($venda->status=='0')
                Cancelada
                @elseif($venda->status=='1')
                Finalizada
                @else
                Pagamento pendente
                @endif
              </td>
              <td>
                @if($venda->status==2)
                @if(session('usuario_funcao_id')=='1' || session('usuario_funcao_id')=='3')
                <a class="btn btn-success" href="/vendas/finalizar?venda={{$venda->id_venda}}" title="Finalizar venda"><i class="fa fa-check" style="margin-right: 0"></i></a>
                @endif
                @else
                <a class="btn bg-black" href="/vendas/visualizar?venda={{$venda->id_venda}}" title="Visualizar"><i class="fa fa-eye" style="margin-right: 0"></i></a>
                @endif
                @php
                date_default_timezone_set('America/Sao_Paulo');
                $data_atual = date('Y-m-d');
                $prazo = date('Y-m-d', strtotime('-7 days', strtotime($data_atual)));
                @endphp
                @if($venda->data_venda>=$prazo)
                @csrf
                <meta name="csrf-token" content="{{ csrf_token() }}">
                @if($venda->status=='1' || $venda->status=='2')
                @if(session('usuario_funcao_id')=='1' || session('usuario_funcao_id')=='3')
                <a class="btn btn-danger text-center" onclick="modal_excluir('{{$venda->id_venda}}','{{$venda->data_venda}}','{{$venda->valor_total}}')" title="Cancelar venda"><i class="fa fa-trash" style="margin-right: 0"></i></a>
                @endif
                @endif
                @endif
              </td>
            </tr>
            @endforeach
          </tbody>
        </table>

        <div id="modal">
        </div>

        <div class="modal fade" id="modal-resposta" tabindex="-1" role="dialog" aria-labelledby="modaRespostaLabel">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h4 class="modal-title" id="modalRespostaLabel">Mensagem <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h4>
              </div>
              <div class="modal-body">
                <p id="modal-resposta-texto"></p>
              </div>
              <div class="modal-footer">
                <div class="btn-group" role="group">
                  <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i>Fechar</button>
                </div>
                <!-- /.btn-group -->
              </div>
            </div>
          </div>
        </div>

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
                  title: 'Relatório de vendas',
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

          function modal_excluir(id, data, valor) {
            var dt = new Date(data).toLocaleDateString('pt-br', {
              timeZone: 'UTC'
            });

            var modal_excluir = '\
            <div class="modal fade" id="modal_excluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">\
                <div class="modal-dialog" role="document">\
                    <div class="modal-content">\
                        <div class="modal-header">\
                            <h4 class="modal-title" id="myModalLabel">Mensagem <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h4>\
                        </div>\
                        <div class="modal-body">\
                            Você tem certeza que deseja cancelar a venda do dia <b>' + dt + '</b>, no valor de <b>R$ ' + valor + '</b>?\
                        </div>\
                        <div class="modal-footer">\
                            <div class="btn-group" role="group">\
                                <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>\
                                <button type="button" class="btn bg-danger btn-wide btn-rounded" onclick="excluir(\'' + id + '\')"><i class="fa fa-trash"></i> Cancelar</button>\
                            </div>\
                            <!-- /.btn-group -->\
                        </div>\
                    </div>\
                </div>\
            </div>\
            ';
            var modal = document.getElementById('modal');
            modal.innerHTML = "";
            modal.innerHTML = modal_excluir;
            $('#modal_excluir').modal({
              show: true
            });
          }

          function excluir(id) {

            var modal_texto = document.getElementById('modal-resposta-texto');

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
              url: "/vendas/excluir",
              method: 'post',
              data: {
                'id_venda': id,
              },
              success: function(response) {

                if (response.resposta == 'excluido') {
                  modal_texto.innerHTML = '';
                  modal_texto.innerHTML = 'Venda cancelada com sucesso!';
                  $('#modal-resposta').modal({
                    show: true
                  });
                  window.location.href = "/vendas";
                } else if (response.resposta == 'excluido_credito') {
                  modal_texto.innerHTML = '';
                  modal_texto.innerHTML = 'Venda cancelada com sucesso! O crédito interno do cliente foi restituído para seu cadastro.';
                  $('#modal-resposta').modal({
                    show: true
                  });
                  window.location.href = "/vendas";
                }
              },
              error: function(response) {
                modal_texto.innerHTML = '';
                modal_texto.innerHTML = 'Erro: ' + response.responseJSON.message;
                $('#modal-resposta').modal({
                  show: true
                });
              }
            });

          }
        </script>

      </div>
    </div>
  </div>
</div>
@stop