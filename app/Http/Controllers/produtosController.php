<?php

namespace App\Http\Controllers;

use App\Models\produtosModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class produtosController extends Controller
{

    public function alterar()
    {
        $produto = new produtosModel();
        $produto->setId_produto($_POST['id_produto']);
        $produto->setNome($_POST['nome']);
        $produto->setValor($_POST['valor']);
        $produto->setMarca($_POST['marca']);
        $produto->setCategoria($_POST['categoria']);
        $produto->setDescricao($_POST['descricao']);
        $produto->alterar();
        $resposta = array('resposta' => $produto->getResposta());
        return Response()->json($resposta);
    }

    public function ativar(){
        $produto = new produtosModel();
        $produto->setId_produto($_POST['id_produto']);
        $produto->ativar();
        $resposta = array('resposta' => $produto->getResposta());
        return Response()->json($resposta);
    }

    public function buscar()
    {
        $produtos = DB::table('produtos')->get();
        return view('produtos/produtos', compact('produtos'));
    }

    public function cadastrar()
    {
        $produto = new produtosModel();
        $produto->setNome($_POST['nome']);
        $produto->setValor($_POST['valor']);
        $produto->setMarca($_POST['marca']);
        $produto->setCategoria($_POST['categoria']);
        $produto->setDescricao($_POST['descricao']);
        $produto->cadastrar();
        $resposta = array('resposta' => $produto->getResposta());
        return Response()->json($resposta);
    }

    public function excluir(){
        $produto = new produtosModel();
        $produto->setId_produto($_POST['id_produto']);
        $produto->excluir();
        $resposta = array('resposta' => $produto->getResposta());
        return Response()->json($resposta);
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
