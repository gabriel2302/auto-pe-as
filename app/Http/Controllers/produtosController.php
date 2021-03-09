<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class produtosController extends Controller
{
    public function buscar()
    {
        $produtos = DB::table('produtos')->get();
        return view('produtos/produtos', compact('produtos'));
    }

    public function visualizar()
    {
        if (isset($_GET['produto']) && !empty($_GET['produto'])) {
            $valida_produto = DB::table('produtos')->where('id_produto', '=', $_GET['produto'])->count();
            if ($valida_produto != 0) {
                $dados_produtos = DB::table('produtos')->where('id_produto', '=', $_GET['produto'])->get();
                if (isset($_GET['alterar'])) {
                    $categorias = DB::table('categoria')->get();
                    $marcas = DB::table('marca')->get();
                    return view('produtos/alterar', compact('dados_produtos', 'categorias', 'marcas'));
                } else {
                    $categorias = DB::table('categoria')->get();
                    $marcas = DB::table('marca')->get();
                    return view('produtos/visualizar', compact('dados_produtos', 'categorias', 'marcas'));
                }
            } else {
                return redirect()->route('produtos');
            }
        } else {
            return redirect()->route('produtos');
        }
    }  
}


