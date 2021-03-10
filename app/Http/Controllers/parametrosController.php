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
        $marcas->setNome($_POST['nomeMarca']);
        $marcas->cadastrarMarca();
        $resposta = array('resposta' => $marcas->getResposta());
        return Response()->json($resposta);
    }

    public function cadastrarCategoria()
    {
        $categorias = new parametrosModel();
        $categorias->setNomecategoria($_POST['nomeCategoria']);
        $categorias->cadastrarCategoria();
        $resposta = array('resposta' => $categorias->getResposta());
        return Response()->json($resposta);
    }

    public function alterarCategoria()
    {
        $categorias = new parametrosModel();
        $categorias->setNomecategoria($_POST['nomeCategoria']);  
        $categorias->setId_categoria($_POST['id_categoria']);              
        $categorias->alterarCategoria();
        $resposta = array('resposta' => $categorias->getResposta());
        return Response()->json($resposta);
    }

    public function alterarMarca()
    {
        $marcas = new parametrosModel();
        $marcas->setNomemarca($_POST['nomeMarca']);  
        $marcas->setId_marca($_POST['id_marca']);              
        $marcas->alterarMarca();
        $resposta = array('resposta' => $marcas->getResposta());
        return Response()->json($resposta);
    }
}
