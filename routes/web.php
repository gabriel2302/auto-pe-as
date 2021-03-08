<?php

use App\Http\Controllers\clientesController;
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
    return view('inicio/inicio', compact('numero_clientes'));
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