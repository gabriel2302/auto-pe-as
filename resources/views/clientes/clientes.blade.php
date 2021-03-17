@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
  <div class="col-md-6">
    <ul class="breadcrumb">
      <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
      <li class="active">Clientes</li>
    </ul>
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-heading">
        <div class="panel-title">
          <h5>Clientes</h5>
        </div>
        <br>
        <div class="row">
          <div class="col-md-12 form-group">
            <a class="btn btn-primary" href="/clientes/cadastrar-pf">Cadastrar pessoa física</a>
            <a class="btn btn-primary" href="/clientes/cadastrar-pj">Cadastrar pessoa jurídica</a>
          </div>
        </div>
      </div>

      <div class="panel-body">
        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nome/Razão social</th>
              <th>CPF/CNPJ</th>
              <th>Telefone</th>
              <th>WhatsApp</th>
              <th>Situação</th>
              <th style="display: none;">Endereço</th>
              <th width="130px">Opções</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Nome/Razão social</th>
              <th>CPF/CNPJ</th>
              <th>Telefone</th>
              <th>WhatsApp</th>
              <th>Situação</th>
              <th style="display: none;">Endereço</th>
              <th width="130px">Opções</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($clientes as $cliente)
            <tr>
              <td>{{$cliente->razao_social}}</td>
              <td>{{$cliente->cpf_cnpj}}</td>
              <td>{{$cliente->telefone}}</td>
              <td>{{$cliente->whatsapp}}</td>
              <td>{{$cliente->status=='1'?'Ativo':'Inativo'}}</td>
              <td style="display: none;">{{$cliente->endereco}}, {{$cliente->numero}} - {{$cliente->bairro}} - {{$cliente->cidade}} / {{$cliente->estado}}</td>
              <td>
                <a class="btn btn-primary" href="/clientes/alterar?cliente={{$cliente->id_cliente}}&alterar" title="Alterar"><i class="fa fa-pencil"></i></a>
                <a class="btn bg-black" href="/clientes/visualizar?cliente={{$cliente->id_cliente}}&visualizar" title="Visualizar"><i class="fa fa-eye"></i></a>
                @csrf
                <meta name="csrf-token" content="{{ csrf_token() }}">
                @if($cliente->status=='1')
                <a class="btn btn-danger text-center" onclick="modal_excluir('{{$cliente->razao_social}}', '{{$cliente->id_cliente}}')" title="Excluir/Inativar"><i class="fa fa-trash"></i></a>
                @else
                <a class="btn btn-success" onclick="modal_ativar('{{$cliente->razao_social}}', '{{$cliente->id_cliente}}')" title="Ativar"><i class="fa fa-check"></i></a>
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
              buttons: [
                {
                  extend: 'print',
                  title: 'Relatório de clientes',
                  text: '<i title="Imprimir" class="fa fa-print"></i>',
                  className: 'btn btn-primary',
                  orientation: 'landscape',
                  exportOptions: {
                    modifier: {
                      page: 'current'
                    },
                    columns: [0,1, 2, 3, 5]
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

          function modal_ativar(cliente, id_cliente) {
            var modal_ativar = '\
            <div class="modal fade" id="modal_ativar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">\
                <div class="modal-dialog" role="document">\
                    <div class="modal-content">\
                        <div class="modal-header">\
                            <h4 class="modal-title" id="myModalLabel">Mensagem <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h4>\
                        </div>\
                        <div class="modal-body">\
                            Você tem certeza que deseja ativar o cliente ' + cliente + '\
                        </div>\
                        <div class="modal-footer">\
                            <div class="btn-group" role="group">\
                                <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i>Fechar</button>\
                                <button type="button" class="btn bg-success btn-wide btn-rounded" onclick="ativar(\'' + id_cliente + '\')"><i class="fa fa-check"></i>Ativar</button>\
                            </div>\
                            <!-- /.btn-group -->\
                        </div>\
                    </div>\
                </div>\
            </div>\
            ';
            var modal = document.getElementById('modal');
            modal.innerHTML = "";
            modal.innerHTML = modal_ativar;
            $('#modal_ativar').modal({
              show: true
            });
          }

          function ativar(id_cliente) {
            var modal_texto = document.getElementById('modal-resposta-texto');

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
              url: "/clientes/ativar",
              method: 'post',
              data: {
                'id_cliente': id_cliente,
              },
              success: function(response) {

                if (response.resposta == 'ativado') {
                  modal_texto.innerHTML = '';
                  modal_texto.innerHTML = 'Cliente ativado com sucesso!';
                  $('#modal-resposta').modal({
                    show: true
                  });
                  window.location.href = "/clientes";
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

          function modal_excluir(cliente, id_cliente) {
            var modal_excluir = '\
            <div class="modal fade" id="modal_excluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">\
                <div class="modal-dialog" role="document">\
                    <div class="modal-content">\
                        <div class="modal-header">\
                            <h4 class="modal-title" id="myModalLabel">Mensagem <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h4>\
                        </div>\
                        <div class="modal-body">\
                            Você tem certeza que deseja excluir o cliente ' + cliente + '\
                        </div>\
                        <div class="modal-footer">\
                            <div class="btn-group" role="group">\
                                <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i>Fechar</button>\
                                <button type="button" class="btn bg-danger btn-wide btn-rounded" onclick="excluir(\'' + id_cliente + '\')"><i class="fa fa-trash"></i>Excluir</button>\
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

          function excluir(id_cliente) {

            var modal_texto = document.getElementById('modal-resposta-texto');

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
              url: "/clientes/excluir",
              method: 'post',
              data: {
                'id_cliente': id_cliente,
              },
              success: function(response) {

                if (response.resposta == 'excluido') {
                  modal_texto.innerHTML = '';
                  modal_texto.innerHTML = 'Cliente excluído com sucesso!';
                  $('#modal-resposta').modal({
                    show: true
                  });
                  window.location.href = "/clientes";
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