@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
    <div class="col-md-6">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
            <li><a href="/categorias">Categorias</a></li>
            <li class="active">Alterar categoria</li>
        </ul>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h5>Alterar categoria</h5>
                </div>
            </div>
            <div class="panel-body">
            @foreach($dados_categorias as $categoria)
                <form class="p-20" action="javascript:void(0)" method="POST" id="form-alterar-categoria">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input  type="hidden" id="url_form" name="url_form" value="{{route('categoria-alterar')}}">                 
                    <div id="campos-cadastro" >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nomeCategoria">Nome <b>*</b></label>
                                    <input type="text" class="form-control" id="nomeCategoria" name="nomeCategoria" value="{{$categoria->descricao}}">
                                    <input  type="hidden" class="form-control" id="id_categoria" name="id_categoria" value="{{$categoria->id_categoria}}">
                                </div>
                            </div>
                        </div>                        

                        <small class="form-text text-muted">Os campos com <b>*</b> são obrigatórios o preenchimento!</small>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right mt-10" role="group">
                                    <a href="/categorias" class="btn bg-black btn-wide"><i class="fa fa-times"></i>Voltar</a href="/clientes">
                                    <button type="button" class="btn btn-primary btn-wide" id="btn-cadastrar"><i class="fa fa-arrow-right"></i>Alterar</button>
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

<script>    

    $(document).ready(function() {
        $('#btn-cadastrar').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#btn-cadastrar').html('Alterando...');
            var url_atual = document.getElementById('url_form').value;
            var modal_texto = document.getElementById('modal-resposta-texto');

            $.ajax({
                url: "" + url_atual + "",
                method: 'post',
                data: $('#form-alterar-categoria').serialize(),
                success: function(response) {

                    if (response.resposta == 'alterado') {
                        modal_texto.innerHTML = '';
                        modal_texto.innerHTML = 'Categoria alterada com sucesso!';
                        $('#modal-resposta').modal({
                            show: true
                        });
                        document.getElementById("form-alterar-categoria").reset();
                        $('#btn-cadastrar').html('Alterar');
                        window.location.href = "/categorias";
                    } else {
                        if (response.resposta == 'categoria_cadastrada') {
                            modal_texto.innerHTML = '';
                            modal_texto.innerHTML = 'Desculpe, mas essa categoria já está cadastrada!';
                            $('#modal-resposta').modal({
                                show: true
                            });
                            $('#btn-cadastrar').html('Alterar');
                        } else {
                            if (response.resposta == 'vazio') {
                                modal_texto.innerHTML = '';
                                modal_texto.innerHTML = 'Por favor, verifique se os campos obrigatórios foram preenchidos!';
                                $('#modal-resposta').modal({
                                    show: true
                                });
                                $('#btn-cadastrar').html('Alterar');
                            } 
                        }
                    }
                },
                error: function(response) {
                    modal_texto.innerHTML = '';
                    modal_texto.innerHTML = 'Erro: ' + response.responseJSON.message;
                    $('#modal-resposta').modal({
                        show: true
                    });
                    $('#btn-cadastrar').html('Alterar');
                }
            });
        });
    });

   
</script>
@stop