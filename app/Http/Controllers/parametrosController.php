<?php

namespace App\Http\Controllers;

use App\Models\parametrosModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class parametrosController extends Controller
{
    public function buscar()
    {
        $categorias = DB::table('categoria')->get();
        return view('categorias/categorias', compact('categorias'));
    }

    public function buscarMarca()
    {
        $marcas = DB::table('marca')->get();
        return view('marcas/marcas', compact('marcas'));
    }

    public function visualizar()
    {
        if (isset($_GET['categoria']) && !empty($_GET['categoria'])) {
            $valida_categoria = DB::table('categoria')->where('id_categoria', '=', $_GET['categoria'])->count();
            if ($valida_categoria != 0) {
                $dados_categorias = DB::table('categoria')->where('id_categoria', '=', $_GET['categoria'])->get();
                if (isset($_GET['alterar'])) {
                    return view('categorias/alterar', compact('dados_categorias'));
                } else {
                    return view('categorias/visualizar', compact('dados_categorias'));
                }
            } else {
                return redirect()->route('categorias');
            }
        } else {
            return redirect()->route('categorias');
        }
    }

    //Marcas

    public function visualizarMarca()
    {
        if (isset($_GET['marca']) && !empty($_GET['marca'])) {
            $valida_marca = DB::table('marca')->where('id_marca', '=', $_GET['marca'])->count();
            if ($valida_marca != 0) {
                $dados_marcas = DB::table('marca')->where('id_marca', '=', $_GET['marca'])->get();
                if (isset($_GET['alterar'])) {
                    return view('marcas/alterar', compact('dados_marcas'));
                } else {
                    return view('marcas/visualizar', compact('dados_marcas'));
                }
            } else {
                return redirect()->route('marcas');
            }
        } else {
            return redirect()->route('marcas');
        }
    }  

    public function cadastrarMarca()
    {
        $marcas = new parametrosModel();
        $marcas->setDescricao($_POST['nomeMarca']);
        $marcas->cadastrarMarca();
        $resposta = array('resposta' => $marcas->getResposta());
        return Response()->json($resposta);
    }

    public function ativarMarca(){
        $marca = new parametrosModel();
        $marca->setId_marca($_POST['id_marca']);
        $marca->ativarMarca();
        $resposta = array('resposta' => $marca->getResposta());
        return Response()->json($resposta);
    }

    public function excluirMarca(){
        $marca = new parametrosModel();
        $marca->setId_marca($_POST['id_marca']);
        $marca->excluirMarca();
        $resposta = array('resposta' => $marca->getResposta());
        return Response()->json($resposta);
    }

    public function alterarMarca()
    {
        $marca = new parametrosModel();
        $marca->setId_marca($_POST['id_marca']);
        $marca->setDescricao($_POST['descricao']);
        $marca->alterarMarca();
        $resposta = array('resposta' => $marca->getResposta());
        return Response()->json($resposta);
    }

    //Categorias

    public function cadastrarCategoria()
    {
        $categorias = new parametrosModel();
        $categorias->setDescricao($_POST['nomeCategoria']);
        $categorias->cadastrarCategoria();
        $resposta = array('resposta' => $categorias->getResposta());
        return Response()->json($resposta);
    }

    
    public function ativarCategoria(){
        $categoria = new parametrosModel();
        $categoria->setId_categoria($_POST['id_categoria']);
        $categoria->ativarCategoria();
        $resposta = array('resposta' => $categoria->getResposta());
        return Response()->json($resposta);
    }

    public function excluirCategoria(){
        $categoria = new parametrosModel();
        $categoria->setId_categoria($_POST['id_categoria']);
        $categoria->excluirCategoria();
        $resposta = array('resposta' => $categoria->getResposta());
        return Response()->json($resposta);
    }

    public function alterarCategoria()
    {
        $categoria = new parametrosModel();
        $categoria->setId_categoria($_POST['id_categoria']);
        $categoria->setDescricao($_POST['descricao']);
        $categoria->alterarCategoria();
        $resposta = array('resposta' => $categoria->getResposta());
        return Response()->json($resposta);
    }

    function buscarParametrosDeVenda() {
        $parametros = DB::table('pdv')->get();
        return view('parametros-de-venda/visualizar', compact('parametros'));
    }

    //Parametros de venda

    function alterarParametrosDeVenda() {
        $parametro = new parametrosModel();
        $parametro->setId_parametro($_POST['id']);  
        $parametro->setValor($_POST['valor']);
        $parametro->alterarParametro();
        $resposta = array('resposta' => $parametro->getResposta());
        return Response()->json($resposta);
    }
}
