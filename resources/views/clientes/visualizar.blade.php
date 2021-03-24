@extends('base/layout')

@section('conteudo')
<div class="row breadcrumb-div">
    <div class="col-md-6">
        <ul class="breadcrumb">
            <li><a href="/"><i class="fa fa-home"></i> Início</a></li>
            <li><a href="/clientes">Clientes</a></li>
            <li class="active">Visualizar cliente</li>
        </ul>
    </div>
</div>
<br>
<div class="row">
    <div class="col-md-12">
        <div class="panel">
            <div class="panel-heading">
                <div class="panel-title">
                    <h5>Visualizar cliente</h5>
                </div>
            </div>
            <div class="panel-body">
                @foreach($dados_cliente as $cliente)
                @if($cliente->tipo_pessoa=='pessoa_fisica')
                <h5 class="underline mt-n">Informações pessoais</h5>

                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="nome">Nome</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{$cliente->nome_fantasia}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cpf_cnpj">CPF</label>
                            <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value="{{$cliente->cpf_cnpj}}" readonly>
                        </div>
                    </div>
                </div>

                <h5 class="underline mt-30">Informações de contato</h5>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep" value="{{$cliente->cep}}" readonly>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" value="{{$cliente->endereco}}" readonly>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label for="numero">Número</label>
                        <input type="number" min="0" class="form-control" id="numero" name="numero" value="{{$cliente->numero}}" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento" value="{{$cliente->complemento}}" readonly>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" value="{{$cliente->bairro}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" readonly value="{{$cliente->cidade}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" readonly value="{{$cliente->estado}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" value="{{$cliente->telefone}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="celular">Celular</label>
                            <input type="text" class="form-control" id="celular" name="celular" value="{{$cliente->celular}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="whatsapp">WhatsApp</label>
                            <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{$cliente->whatsapp}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$cliente->email}}" readonly>
                        </div>
                    </div>

                </div>

                <h5 class="underline mt-30">Crédito</h5>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="credito_disponivel">Crédito disponível</label>
                            <input type="text" class="form-control" id="credito_disponivel" name="credito_disponivel" value="R$ {{($cliente->credito)-($cliente->credito_utilizado)}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="credito_utilizado">Crédito utilizado</label>
                            <input type="text" class="form-control" id="credito_utilizado" name="credito_utilizado" value="R$ {{$cliente->credito_utilizado}}" readonly>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group pull-right mt-10" role="group">
                            <a href="/clientes" class="btn bg-black btn-wide"><i class="fa fa-arrow-left"></i> Voltar</a>
                            <a href="/clientes/alterar?cliente={{$cliente->id_cliente}}&alterar" class="btn btn-primary btn-wide" id="btn-alterar"><i class="fa fa-arrow-right"></i> Alterar</a>
                        </div>
                    </div>
                </div>

                @else
                <h5 class="underline mt-n">Informações pessoais</h5>

                <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="nome_fantasia">Nome fantasia</label>
                            <input type="text" class="form-control" id="nome_fantasia" name="nome_fantasia" value="{{$cliente->nome_fantasia}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="razao_social">Razão social</label>
                            <input type="text" class="form-control" id="razao_social" name="razao_social" value="{{$cliente->razao_social}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cpf_cnpj">CNPJ</label>
                            <input type="text" class="form-control" id="cpf_cnpj" name="cpf_cnpj" value="{{$cliente->cpf_cnpj}}" readonly>
                        </div>
                    </div>
                </div>

                <h5 class="underline mt-30">Informações de contato</h5>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="cep">CEP</label>
                            <input type="text" class="form-control" id="cep" name="cep" value="{{$cliente->cep}}" readonly>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-md-10">
                        <div class="form-group">
                            <label for="endereco">Endereço</label>
                            <input type="text" class="form-control" id="endereco" name="endereco" value="{{$cliente->endereco}}" readonly>
                        </div>
                    </div>

                    <div class="col-md-2">
                        <label for="numero">Número</label>
                        <input type="number" min="0" class="form-control" id="numero" name="numero" value="{{$cliente->numero}}" readonly>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="complemento">Complemento</label>
                            <input type="text" class="form-control" id="complemento" name="complemento" value="{{$cliente->complemento}}" readonly>
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="bairro">Bairro</label>
                            <input type="text" class="form-control" id="bairro" name="bairro" value="{{$cliente->bairro}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" id="cidade" name="cidade" readonly value="{{$cliente->cidade}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-group">
                            <label for="estado">Estado</label>
                            <input type="text" class="form-control" id="estado" name="estado" readonly value="{{$cliente->estado}}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" id="telefone" name="telefone" value="{{$cliente->telefone}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="celular">Celular</label>
                            <input type="text" class="form-control" id="celular" name="celular" value="{{$cliente->celular}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="whatsapp">WhatsApp</label>
                            <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{$cliente->whatsapp}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="email">E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$cliente->email}}" readonly>
                        </div>
                    </div>

                </div>

                <h5 class="underline mt-30">Crédito</h5>

                <div class="row">
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="credito_disponivel">Crédito disponível</label>
                            <input type="text" class="form-control" id="credito_disponivel" name="credito_disponivel" value="R$ {{($cliente->credito)-($cliente->credito_utilizado)}}" readonly>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="form-group">
                            <label for="credito_utilizado">Crédito utilizado</label>
                            <input type="text" class="form-control" id="credito_utilizado" name="credito_utilizado" value="R$ {{$cliente->credito_utilizado}}" readonly>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <div class="col-md-12">
                        <div class="btn-group pull-right mt-10" role="group">
                            <a href="/clientes" class="btn bg-black btn-wide"><i class="fa fa-arrow-left"></i> Voltar</a>
                            <a href="/clientes/alterar?cliente={{$cliente->id_cliente}}&alterar" class="btn btn-primary btn-wide" id="btn-alterar"><i class="fa fa-arrow-right"></i> Alterar</a>
                        </div>
                    </div>
                </div>

                @endif
                @endforeach
            </div>
        </div>
    </div>
</div>
@stop