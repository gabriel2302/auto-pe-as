<?php

namespace App\Http\Controllers;

use App\Models\vendasModel;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class vendasController extends Controller
{
    public function efetuar()
    {
        $vendas = new vendasModel();
        $vendas->setUsuario_id($_POST['usuario_id']);
        $vendas->setCliente_id($_POST['cliente_id']);
        $vendas->setDesconto($_POST['desconto']);
        $vendas->setValor_total($_POST['valor_total']);
        date_default_timezone_set('America/Sao_Paulo');
        $vendas->setData_venda(date('Y-m-d'));
        $vendas->setStatus('2');

        isset($_POST['node_produto']) ? $vendas->setNode_produto($_POST['node_produto']) : $vendas->setNode_produto(NULL);
        isset($_POST['produto']) ? $vendas->setProdutos($_POST['produto']) : $vendas->setProdutos(NULL);
        $vendas->efetuar();
        $resposta = array('resposta' => $vendas->getResposta());
        return Response()->json($resposta);
    }

    public function buscar()
    {
        $vendas = DB::table('vendas')->orderByDesc('data_venda')->get();
        $clientes = DB::table('clientes')->get();
        return view('vendas/vendas', compact('vendas', 'clientes'));
    }

    public function visualizar()
    {
        if (isset($_GET['venda']) && !empty($_GET['venda'])) {
            $valida_venda = DB::table('vendas')->where('id_venda', '=', $_GET['venda'])->where('status', '<=', '1')->count();
            if ($valida_venda != 0) {
                $produtos = DB::table('produtos')->get();
                $clientes = DB::table('clientes')->get();
                $vendas = DB::table('vendas')->where('id_venda', '=', $_GET['venda'])->get();
                $vendas_produtos = DB::table('itens_venda')->where('venda_id', '=', $_GET['venda'])->get();
                return view('vendas/visualizar', compact('vendas', 'vendas_produtos', 'produtos', 'clientes'));
            } else {
                return redirect()->route('vendas');
            }
        } else {
            return redirect()->route('vendas');
        }
    }

    public function finalizarVisualizar()
    {
        if (isset($_GET['venda']) && !empty($_GET['venda'])) {
            $valida_venda = DB::table('vendas')->where('id_venda', '=', $_GET['venda'])->where('status', '=', '2')->count();
            if ($valida_venda != 0) {
                $produtos = DB::table('produtos')->get();
                $clientes = DB::table('clientes')->get();
                $vendas = DB::table('vendas')->where('id_venda', '=', $_GET['venda'])->get();
                $vendas_produtos = DB::table('itens_venda')->where('venda_id', '=', $_GET['venda'])->get();
                return view('vendas/finalizar', compact('vendas', 'vendas_produtos', 'produtos', 'clientes'));
            } else {
                return redirect()->route('vendas');
            }
        } else {
            return redirect()->route('vendas');
        }
    }

    public function finalizar()
    {
        $vendas = new vendasModel();
        $vendas->setForma_pagamento($_POST['forma_pagamento']);
        $vendas->setCliente_id($_POST['cliente_id']);
        $vendas->setId_venda($_POST['id_venda']);
        $vendas->finalizar();
        $resposta = array('resposta' => $vendas->getResposta());
        return Response()->json($resposta);
    }

    public function excluir(){
        $vendas = new vendasModel();
        $vendas->setId_venda($_POST['id_venda']);
        $vendas->excluir();
        $resposta = array('resposta' => $vendas->getResposta());
        return Response()->json($resposta);
    }
}
