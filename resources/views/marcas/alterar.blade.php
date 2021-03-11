@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
    <div class="col-md-6">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
            <li><a href="/marcas">Marcas</a></li>
            <li class="active">Alterar marca</li>
        </ul>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h5>Alterar marca</h5>
                </div>
            </div>
            <div class="panel-body">
            @foreach($dados_marcas as $marca)
                <form class="p-20" action="javascript:void(0)" method="POST" id="form-alterar-marca">
                    @csrf
                    <meta name="csrf-token" content="{{ csrf_token() }}">
                    <input  type="hidden" id="url_form" name="url_form" value="{{route('marcas-alterar')}}">                 
                    <div id="campos-cadastro" >
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label for="nomeMarca">Nome <b>*</b></label>
                                    <input type="text" class="form-control" id="nomeMarca" name="nomeMarca" value="{{$marca->descricao}}">
                                    <input  type="hidden" class="form-control" id="id_marca" name="id_marca" value="{{$marca->id_marca}}">
                                </div>
                            </div>
                        </div>                        


                        <small class="form-text text-muted">Os campos com <b>*</b> são obrigatórios o preenchimento!</small>

                        <div class="row">
                            <div class="col-md-12">
                                <div class="btn-group pull-right mt-10" role="group">
                                    <a href="/marcas" class="btn bg-black btn-wide"><i class="fa fa-times"></i>Voltar</a href="/marcas">
                                    <button type="button" class="btn btn-primary btn-wide" id="btn-alterar"><i class="fa fa-arrow-right"></i>Alterar</button>
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
        $('#btn-alterar').click(function(e) {
            e.preventDefault();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $('#btn-alterar').html('Alterando...');
            var url_atual = document.getElementById('url_form').value;
            var modal_texto = document.getElementById('modal-resposta-texto');

            $.ajax({
                url: "" + url_atual + "",
                method: 'post',
                data: $('#form-alterar-marca').serialize(),
                success: function(response) {

                    if (response.resposta == 'alterado') {
                        modal_texto.innerHTML = '';
                        modal_texto.innerHTML = 'Marca alterada com sucesso!';
                        $('#modal-resposta').modal({
                            show: true
                        });
                        $('#btn-alterar').html('Alterar');
                    } else {
                        if (response.resposta == 'marca_cadastrada') {
                            modal_texto.innerHTML = '';
                            modal_texto.innerHTML = 'Desculpe, mas essa marca já está cadastrada!';
                            $('#modal-resposta').modal({
                                show: true
                            });
                            $('#btn-alterar').html('Alterar');
                        } else {
                            if (response.resposta == 'vazio') {
                                modal_texto.innerHTML = '';
                                modal_texto.innerHTML = 'Por favor, verifique se os campos obrigatórios foram preenchidos!';
                                $('#modal-resposta').modal({
                                    show: true
                                });
                                $('#btn-alterar').html('Alterar');
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
                    $('#btn-alterar').html('Alterar');
                }
            });
        });
    });

   
</script>
@stop