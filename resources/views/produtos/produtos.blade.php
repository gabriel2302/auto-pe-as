@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
  <div class="col-md-6">
    <ul class="breadcrumb">
      <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
      <li class="active">Produtos</li>
    </ul>
  </div>
</div>
<br>
<div class="row">
  <div class="col-md-12">
    <div class="panel">
      <div class="panel-heading">
        <div class="panel-title">
          <h5>Produtos</h5>
        </div>
        <br>
        <div class="row">
          <div class="col-md-12 form-group">
            <a class="btn btn-primary" href="/produtos/cadastrar">Cadastrar </a>
          </div>
        </div>
      </div>

      <div class="panel-body">
        <table id="example" class="display table table-striped table-bordered" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th>Nome</th>
              <th>Quantidade</th>
              <th>Valor</th>
              <th>Situação</th>
              <th width="130px">Opções</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th>Nome</th>
              <th>Quantidade</th>
              <th>Valor</th>
              <th>Situação</th>
              <th width="130px">Opções</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($produtos as $produto)
            <tr>
              <td>{{$produto->nome}}</td>
              <td>{{$produto->quantidade}}</td>
              <td>{{$produto->valor}}</td>
              <td>{{$produto->status=='1'?'Ativo':'Inativo'}}</td>
              <td>
                <a class="btn btn-primary" href="/produtos/alterar?produto={{$produto->id_produto}}&alterar" title="Alterar"><i class="fa fa-pencil"></i></a>
                <a class="btn bg-black" href="/produtos/visualizar?produto={{$produto->id_produto}}&visualizar" title="Visualizar"><i class="fa fa-eye"></i></a>
                @csrf
                <meta name="csrf-token" content="{{ csrf_token() }}">
                @if($produto->status=='1')
                <a class="btn btn-danger text-center" onclick="modal_excluir('{{$produto->nome}}', '{{$produto->id_produto}}')" title="Excluir/Inativar"><i class="fa fa-trash"></i></a>
                @else
                <a class="btn btn-success" onclick="modal_ativar('{{$produto->nome}}', '{{$produto->id_produto}}')" title="Ativar"><i class="fa fa-check"></i></a>
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

          function modal_ativar(produto, id_produto) {
            var modal_ativar = '\
            <div class="modal fade" id="modal_ativar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">\
                <div class="modal-dialog" role="document">\
                    <div class="modal-content">\
                        <div class="modal-header">\
                            <h4 class="modal-title" id="myModalLabel">Mensagem <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h4>\
                        </div>\
                        <div class="modal-body">\
                            Você tem certeza que deseja ativar o produto <b>' + produto + '</b>?\
                        </div>\
                        <div class="modal-footer">\
                            <div class="btn-group" role="group">\
                                <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>\
                                <button type="button" class="btn bg-success btn-wide btn-rounded" onclick="ativar(\'' + id_produto + '\')"><i class="fa fa-check"></i> Ativar</button>\
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

          function ativar(id_produto) {
            var modal_texto = document.getElementById('modal-resposta-texto');

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
              url: "/produtos/ativar",
              method: 'post',
              data: {
                'id_produto': id_produto,
              },
              success: function(response) {

                if (response.resposta == 'ativado') {
                  modal_texto.innerHTML = '';
                  modal_texto.innerHTML = 'Produto ativado com sucesso!';
                  $('#modal-resposta').modal({
                    show: true
                  });
                  window.location.href = "/produtos";
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

          function modal_excluir(produto, id_produto) {
            var modal_excluir = '\
            <div class="modal fade" id="modal_excluir" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">\
                <div class="modal-dialog" role="document">\
                    <div class="modal-content">\
                        <div class="modal-header">\
                            <h4 class="modal-title" id="myModalLabel">Mensagem <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button></h4>\
                        </div>\
                        <div class="modal-body">\
                            Você tem certeza que deseja inativar/excluir o produto <b>' + produto + '</b>?\
                        </div>\
                        <div class="modal-footer">\
                            <div class="btn-group" role="group">\
                                <button type="button" class="btn btn-gray btn-wide btn-rounded" data-dismiss="modal"><i class="fa fa-times"></i> Fechar</button>\
                                <button type="button" class="btn bg-danger btn-wide btn-rounded" onclick="excluir(\'' + id_produto + '\')"><i class="fa fa-trash"></i> Inativar/Excluir</button>\
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

          function excluir(id_produto) {

            var modal_texto = document.getElementById('modal-resposta-texto');

            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
              }
            });

            $.ajax({
              url: "/produtos/excluir",
              method: 'post',
              data: {
                'id_produto': id_produto,
              },
              success: function(response) {

                if (response.resposta == 'excluido') {
                  modal_texto.innerHTML = '';
                  modal_texto.innerHTML = 'Produto inativado/excluído com sucesso!';
                  $('#modal-resposta').modal({
                    show: true
                  });
                  window.location.href = "/produtos";
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