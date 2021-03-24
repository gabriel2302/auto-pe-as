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

    public function ativar()
    {
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

    public function excluir()
    {
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
                $produtos = DB::table('produtos')->where('id_produto', '=', $_GET['produto'])->get();
                if (isset($_GET['alterar'])) {
                    $categorias = DB::table('categoria')->get();
                    $marcas = DB::table('marca')->get();
                    return view('produtos/alterar', compact('produtos', 'categorias', 'marcas'));
                } else {
                    $categorias = DB::table('categoria')->get();
                    $marcas = DB::table('marca')->get();
                    return view('produtos/visualizar', compact('produtos', 'categorias', 'marcas'));
                }
            } else {
                return redirect()->route('produtos');
            }
        } else {
            return redirect()->route('produtos');
        }
    }

    public function entrada()
    {
        $entradas = DB::table('entrada_produtos')->get();
        return view('produtos/entrada', compact('entradas'));
    }

    public function entradaCadastrar()
    {
        $entrada = new produtosModel();
        $entrada->setFornecedor($_POST['fornecedor']);
        $entrada->setNota_fiscal($_POST['nota_fiscal']);
        $entrada->setValor_total($_POST['valor_total']);
        date_default_timezone_set('America/Sao_Paulo');
        $entrada->setData_entrada(date('Y-m-d'));
        isset($_POST['node_produto'])?$entrada->setNode_produtos($_POST['node_produto']):$entrada->setNode_produtos(NULL);
        isset($_POST['produto'])?$entrada->setProdutos($_POST['produto']):$entrada->setProdutos(NULL);
        $entrada->entradaCadastrar();
        $resposta = array('resposta' => $entrada->getResposta());
        return Response()->json($resposta);
    }

    public function entradaVisualizar()
    {
        if (isset($_GET['entrada']) && !empty($_GET['entrada'])) {
            $valida_entrada = DB::table('entrada_produtos')->where('id_entrada', '=', $_GET['entrada'])->count();
            if ($valida_entrada != 0) {
                $entradas = DB::table('entrada_produtos')->where('id_entrada', '=', $_GET['entrada'])->get();
                $itens_entrada = DB::table('itens_entrada_produto')->where('entrada_id', '=', $_GET['entrada'])->get();
                $produtos = DB::table('produtos')->get();
                return view('produtos/visualizar-entrada', compact('entradas', 'itens_entrada', 'produtos'));
            } else {
                return redirect()->route('produtos-entrada');
            }
        } else {
            return redirect()->route('produtos-entrada');
        }
    }
}
