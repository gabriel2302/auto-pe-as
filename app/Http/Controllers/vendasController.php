<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class vendasController extends Controller
{
    public function cadastrar() {

    }

    public function buscar()
    {
        $vendas = DB::table('vendas')->get();
        $clientes = DB::table('clientes')->where('status', '=', '1')->get();
        return view('vendas/vendas', compact('vendas', 'clientes'));
    }

    public function visualizar()
    {
        if (isset($_GET['venda']) && !empty($_GET['venda'])) {
            $valida_venda = DB::table('vendas')->where('id_venda', '=', $_GET['venda'])->count();
            if ($valida_venda != 0) {
                $produtos = DB::table('produtos')->where('status', '=', '1')->get();
                $clientes = DB::table('clientes')->where('status', '=', '1')->get();
                $desconto = DB::table('parametros_de_venda')->where('id_parametro', '=', '2')->first();
                $dados_vendas = DB::table('vendas')->where('id_venda', '=', $_GET['venda'])->get();
                $dados_vendas_produtos = DB::table('itens_venda')->where('venda_id', '=', $_GET['venda'])->get();
                return view('vendas/visualizar', compact('dados_vendas','dados_vendas_produtos', 'produtos', 'clientes', 'desconto'));
            } else {
                return redirect()->route('vendas');
            }
        } else {
            return redirect()->route('vendas');
        }
    }  
}
