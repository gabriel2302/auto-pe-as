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
        <div class="row">
          <div class="col-md-12 form-group">
            <a class="btn btn-primary" href="/vendas/efetuar">Efetuar nova venda</a>
          </div>
        </div>
      </div>

      <div class="panel-body">
        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th width="120px">Data da venda</th>
              <th>Cliente</th>
              <th>Valor</th>
              <th width="80px">Opções</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th width="120px">Data da venda</th>
              <th>Cliente</th>
              <th>Valor</th>
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
                @if($venda->status==2)
                <a class="btn btn-success" href="/vendas/finalizar?venda={{$venda->id_venda}}" title="Finalizar venda"><i class="fa fa-check" style="margin-right: 0"></i></a>
                @else
                <a class="btn bg-black" href="/vendas/visualizar?venda={{$venda->id_venda}}" title="Visualizar"><i class="fa fa-eye" style="margin-right: 0"></i></a>
                @endif
                @csrf
                <meta name="csrf-token" content="{{ csrf_token() }}">
                @if($venda->status=='1' || $venda->status=='2')
                <a class="btn btn-danger text-center" onclick="modal_excluir('{{$venda->id_venda}}','{{$venda->data_venda}}','{{$venda->valor_total}}')" title="Excluir"><i class="fa fa-trash" style="margin-right: 0"></i></a>
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



        <!-- ========== JS ========== -->
        <script type="text/javascript">
          $(document).ready(function() {
            $('#example').DataTable();
          });

          function modal_excluir(id, data, valor) {
            var modal_excluir = '\
            <div class="modal fade" id="modal_excluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">\
                <div class="modal-dialog" role="document">\
                    <div class="modal-content">\
                        <div class="modal-header">\
                            <h4 class="modal-title" id="myModalLabel">Mensagem <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h4>\
                        </div>\
                        <div class="modal-body">\
                            Você tem certeza que deseja excluir a venda do dia ' + data + ', no valor de R$ '+ valor +'?\
                        </div>\
                        <div class="modal-footer">\
                            <div class="btn-group" role="group">\
                                <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i>Fechar</button>\
                                <button type="button" class="btn bg-danger btn-wide btn-rounded" onclick="excluir(\'' + id + '\')"><i class="fa fa-trash"></i>Excluir</button>\
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
                  modal_texto.innerHTML = 'Venda excluída com sucesso!';
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