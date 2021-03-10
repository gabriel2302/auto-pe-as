<?php

use App\Http\Controllers\clientesController;
use App\Http\Controllers\produtosController;
use App\Http\Controllers\usuariosController;
use App\Http\Controllers\parametrosController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $numero_clientes = DB::table('clientes')->where('status', '=', '1')->count();
    $numero_produtos = DB::table('produtos')->count();
    return view('inicio/inicio', compact('numero_clientes', 'numero_produtos'));
});

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
    $categorias = DB::table('categoria')->get();
    $marcas = DB::table('marca')->get();
    return view('produtos/cadastrar', compact('categorias','marcas'));
});

Route::get('/produtos/alterar', [produtosController::class, 'visualizar'])->name('produtos-alterar-visualizar');

Route::get('/produtos/visualizar', [produtosController::class, 'visualizar'])->name('produtos-visualizar');

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

//Rotas Categorias

Route::get('/categorias', [parametrosController::class, 'buscar'])->name('categorias');

Route::get('/categorias/cadastrar', function () {
    return view('categorias/cadastrar');
});
Route::post('/categorias/cadastrar', [parametrosController::class, 'cadastrarCategoria'])->name('categorias-cadastrar');

Route::get('/categorias/alterar', [parametrosController::class, 'visualizar'])->name('categoria-alterar-visualizar');
Route::post('/categorias/alterar', [parametrosController::class, 'alterarCategoria'])->name('categoria-alterar');

Route::get('/categorias/visualizar', [parametrosController::class, 'visualizar'])->name('categoria-visualizar');

//Rotas Marcas

Route::get('/marcas', [parametrosController::class, 'buscarMarca'])->name('marcas');

Route::get('/marcas/cadastrar', function () {
    return view('marcas/cadastrar');
});

Route::post('/marcas/cadastrar', [parametrosController::class, 'cadastrarMarca'])->name('marcas-cadastrar');

Route::get('/marcas/alterar', [parametrosController::class, 'visualizarMarca'])->name('marcas-alterar-visualizar');

Route::get('/marcas/visualizar', [parametrosController::class, 'visualizarMarca'])->name('marcas-visualizar');
