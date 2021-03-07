@extends('base/layout')

@section('conteudo')
<div class="row">
         <a href="index.php" class="btn-circle btn-lg custom-link" title="Voltar"><i class="icoLojaCadastro fas fa-arrow-alt-circle-left"></i> </a>
         <a href="../form/cadastroPessoa.php" class="btn-circle btn-lg custom-link"  title="Cadastrar Loja"><i class="icoLojaCadastro fas fa-plus-circle"></i> </a>        
            <h1 style="font-weight: 330;" class="col-10 text-center">
                <i class="fas fa-users" style="color: #337ab7; "></i>
                Pessoas
            </h1>    
</div> 
<div class="card shadow mb-4 row">
        <div class="card-header py-3 ">
          <h6 class="m-0 font-weight-bold text-primary">Uemg Frutal</h6>
          <div class="form-check" style="float:right;">
          <input class="form-check-input" type="radio" name="exampleRadios" id="inativo" value="option2" >
            <label class="form-check-label" for="inativo">
              Inativo
            </label>
            </div>
            <div class="form-check mr-3" style="float:right;">
            <input class="form-check-input" type="radio" name="exampleRadios" id="ativo" value="option1" checked>
            <label class="form-check-label" for="ativo">
              Ativo
            </label>
          </div>
        </div>
        <div class="card-body">
          <div class="table-responsive" >
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Nome/Nome Fantasia</th>
                        <th>CPF/CNPJ</th>                
                        <th>Consultar</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>System Architect</td>
                    
                        <td>$320,800</td>
                    </tr>
                
                </tbody>
                <tfoot>
                    <tr>
                    <th>Nome/Nome Fantasia</th>
                        <th>CPF/CNPJ</th>                
                        <th>Consutar</th>
                    </tr>
                </tfoot>
            </table>
            </div>
        </div>
      </div>
@stop