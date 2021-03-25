<?php

use App\Http\Controllers\clientesController;
use App\Http\Controllers\produtosController;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\parametrosController;
use App\Http\Controllers\vendasController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;



//Rota Login

Route::middleware(['usuario_logado'])->group(function () {
    Route::get('/login', function () {
        return view('login/login');
    })->name('login');
});

Route::post('/login', [usuariosController::class, 'login'])->name('efetua_login');

Route::post('/logout', [usuariosController::class, 'logout'])->name('efetua_logout');

Route::middleware(['autenticacao'])->group(function () {

    Route::get('/', function () {
        $numero_clientes = DB::table('clientes')->where('status', '=', '1')->count();
        $numero_produtos = DB::table('produtos')->where('status', '=', '1')->count();
        $numero_categorias = DB::table('categoria')->where('status', '=', '1')->count();
        $numero_marcas = DB::table('marca')->where('status', '=', '1')->count();
        return view('inicio/inicio', compact('numero_clientes', 'numero_produtos', 'numero_categorias', 'numero_marcas'));
    })->name('inicio');

    Route::middleware(['admin_vendedor'])->group(function () {

        //Rotas clientes

        Route::get('/clientes', [clientesController::class, 'buscar'])->name('clientes');

        Route::get('/clientes/cadastrar-pf', function () {
            return view('clientes/cadastrar-pessoa-fisica');
        });

        Route::get('/clientes/cadastrar-pj', function () {
            return view('clientes/cadastrar-pessoa-juridica');
        });

        Route::post('/clientes/cadastrar', [clientesController::class, 'cadastrar'])->name('clientes-cadastrar');

        Route::post('/clientes/verificar-cliente', [clientesController::class, 'verificarCliente'])->name('verificar-cliente');

        Route::get('/clientes/alterar', [clientesController::class, 'visualizar'])->name('clientes-alterar-visualizar');

        Route::post('/clientes/alterar', [clientesController::class, 'alterar'])->name('clientes-alterar');

        Route::get('/clientes/visualizar', [clientesController::class, 'visualizar'])->name('clientes-visualizar');

        Route::post('/clientes/excluir', [clientesController::class, 'excluir'])->name('clientes-excluir');

        Route::post('/clientes/ativar', [clientesController::class, 'ativar'])->name('clientes-ativar');

        //Rotas Produtos

        Route::get('/produtos', [produtosController::class, 'buscar'])->name('produtos');

        Route::get('/produtos/cadastrar', function () {
            $categorias = DB::table('categoria')->where('status', '=', '1')->get();
            $marcas = DB::table('marca')->where('status', '=', '1')->get();
            return view('produtos/cadastrar', compact('categorias', 'marcas'));
        });

        Route::post('/produtos/cadastrar', [produtosController::class, 'cadastrar'])->name('produtos-cadastrar');

        Route::get('/produtos/alterar', [produtosController::class, 'visualizar'])->name('produtos-alterar-visualizar');

        Route::post('/produtos/alterar', [produtosController::class, 'alterar'])->name('produtos-alterar');

        Route::get('/produtos/visualizar', [produtosController::class, 'visualizar'])->name('produtos-visualizar');

        Route::post('/produtos/excluir', [produtosController::class, 'excluir'])->name('produtos-excluir');

        Route::post('/produtos/ativar', [produtosController::class, 'ativar'])->name('produtos-ativar');
        
        Route::get('/produtos/entrada', [produtosController::class, 'entrada'])->name('produtos-entrada');
        
        Route::get('/produtos/cadastrar-entrada', function () {
            $produtos = DB::table('produtos')->where('status', '=', '1')->get();
            return view('produtos/cadastrar-entrada', compact('produtos'));
        });

        Route::post('/produtos/cadastrar-entrada', [produtosController::class, 'entradaCadastrar'])->name('produtos-entrada-cadastrar');

        Route::get('/produtos/visualizar-entrada', [produtosController::class, 'entradaVisualizar'])->name('produtos-entrada-visualizar');
    });

    Route::middleware(['admin'])->group(function () {
        // Rotas Usuários

        Route::get('/usuarios', [usuariosController::class, 'buscar'])->name('usuarios');

        Route::get('/usuarios/cadastrar', function () {
            $funcoes = DB::table('funcao')->get();
            return view('usuarios/cadastrar', compact('funcoes'));
        });

        Route::get('/usuarios/alterar', [usuariosController::class, 'visualizar'])->name('usuarios-alterar-visualizar');

        Route::post('/usuarios/alterar', [usuariosController::class, 'alterar'])->name('usuarios-alterar');


        Route::get('/usuarios/visualizar', [usuariosController::class, 'visualizar'])->name('usuarios-visualizar');

        Route::post('/usuarios/verificar-usuario', [usuariosController::class, 'verificarusuarios'])->name('verificar-usuario');

        Route::post('/usuarios/cadastrar', [usuariosController::class, 'cadastrar'])->name('usuarios-cadastrar');

        Route::post('/usuarios/ativar', [usuariosController::class, 'ativar'])->name('usuarios-ativar');

        Route::post('/usuarios/excluir', [usuariosController::class, 'excluir'])->name('usuarios-excluir');

        Route::get('/usuarios/comissoes', function(){
            $vendas = DB::table('vendas')->where('status', '=', '1')->get();
            $usuarios = DB::table('usuarios')->get();
            return view('usuarios/comissoes', compact('vendas', 'usuarios'));
        });



        //Rotas Categorias

        Route::get('/categorias', [parametrosController::class, 'buscar'])->name('categorias');

        Route::get('/categorias/cadastrar', function () {
            return view('categorias/cadastrar');
        });
        Route::post('/categorias/cadastrar', [parametrosController::class, 'cadastrarCategoria'])->name('categoria-cadastrar');

        Route::get('/categorias/alterar', [parametrosController::class, 'visualizar'])->name('categoria-alterar-visualizar');
        Route::post('/categorias/alterar', [parametrosController::class, 'alterarCategoria'])->name('categoria-alterar');

        Route::get('/categorias/visualizar', [parametrosController::class, 'visualizar'])->name('categoria-visualizar');

        Route::post('/categorias/excluir', [parametrosController::class, 'excluirCategoria'])->name('categoria-excluir');

        Route::post('/categorias/ativar', [parametrosController::class, 'ativarCategoria'])->name('categoria-ativar');

        //Rotas Marcas

        Route::get('/marcas', [parametrosController::class, 'buscarMarca'])->name('marcas');

        Route::get('/marcas/cadastrar', function () {
            return view('marcas/cadastrar');
        });

        Route::post('/marcas/cadastrar', [parametrosController::class, 'cadastrarMarca'])->name('marcas-cadastrar');

        Route::get('/marcas/alterar', [parametrosController::class, 'visualizarMarca'])->name('marcas-alterar-visualizar');
        Route::post('/marcas/alterar', [parametrosController::class, 'alterarMarca'])->name('marcas-alterar');

        Route::get('/marcas/visualizar', [parametrosController::class, 'visualizarMarca'])->name('marcas-visualizar');

        Route::post('/marcas/excluir', [parametrosController::class, 'excluirMarca'])->name('marcas-excluir');

        Route::post('/marcas/ativar', [parametrosController::class, 'ativarMarca'])->name('marcas-ativar');

        // Parâmetros de venda

        Route::get('/parametros-de-venda', [parametrosController::class, 'buscarParametrosDeVenda'])->name('parametros-de-venda');
        Route::post('/parametros-de-venda', [parametrosController::class, 'alterarParametrosDeVenda']);
    });

    Route::post('/produtos/info_produto', function(){
        $info_produto = DB::table('produtos')->where('id_produto', '=', $_POST['id_produto'])->get();
        $array_dados = compact('info_produto');
        return json_encode($array_dados);
    });

    Route::get('/vendas', [vendasController::class, 'buscar'])->name('vendas');

    Route::get('/vendas/efetuar', function () {
        $produtos = DB::table('produtos')->where('status', '=', '1')->where('quantidade', '>', '0')->orderBy('nome')->get();
        $clientes = DB::table('clientes')->where('status', '=', '1')->orderBy('razao_social')->get();
        $desconto = DB::table('parametros_de_venda')->where('id_parametro', '=', '2')->first();
        return view('vendas/cadastrar', compact('produtos','clientes', 'desconto'));
    });

    Route::post('/vendas/efetuar', [vendasController::class, 'efetuar'])->name('vendas-efetuar');

    Route::get('/vendas/finalizar', [vendasController::class, 'finalizarBuscar'])->name('vendas-finalizar');

    Route::post('/vendas/finalizar', [vendasController::class, 'finalizar'])->name('vendas-finalizar');

    Route::get('/vendas/visualizar', [vendasController::class, 'visualizar'])->name('vendas-visualizar');

    Route::get('/vendas/finalizar', [vendasController::class, 'finalizarVisualizar'])->name('vendas-finalizar-visualizar');

    Route::post('/vendas/excluir', [vendasController::class, 'excluir'])->name('vendas-excluir');

});
