<?php

namespace App\Http\Controllers;

use App\Models\clientesModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class clientesController extends Controller
{
    public function alterar()
    {
        $cliente = new clientesModel();
        $cliente->setId_cliente($_POST['id_cliente']);
        if ($_POST['tipo_pessoa'] == 'pf') {
            $cliente->setNome_fantasia($_POST['nome']);
            $cliente->setRazao_social($_POST['nome']);
            $cliente->setTipo_pessoa('pessoa_fisica');
        } else {
            $cliente->setNome_fantasia($_POST['nome_fantasia']);
            $cliente->setRazao_social($_POST['razao_social']);
            $cliente->setTipo_pessoa('pessoa_juridica');
        }
        $cliente->setCpf_cnpj($_POST['cpf_cnpj']);
        $cliente->setTelefone($_POST['telefone']);
        $cliente->setCelular($_POST['celular']);
        $cliente->setWhatsapp($_POST['whatsapp']);
        $cliente->setEmail($_POST['email']);
        $cliente->setCep($_POST['cep']);
        $cliente->setEndereco($_POST['endereco']);
        $cliente->setNumero($_POST['numero']);
        $cliente->setComplemento($_POST['complemento']);
        $cliente->setBairro($_POST['bairro']);
        $cliente->setCidade($_POST['cidade']);
        $cliente->setEstado($_POST['estado']);
        date_default_timezone_set('America/Sao_Paulo');
        $cliente->setData_alteracao(date('Y-m-d H:i:s'));
        $cliente->setStatus('1');
        $cliente->alterar();
        $resposta = array('resposta' => $cliente->getResposta());
        return Response()->json($resposta);
    }

    public function ativar()
    {
        $cliente = new clientesModel();
        $cliente->setId_cliente($_POST['id_cliente']);
        $cliente->ativar();
        $resposta = array('resposta' => $cliente->getResposta());
        return Response()->json($resposta);
    }

    public function buscar()
    {
        $clientes = DB::table('clientes')->orderBy('razao_social')->get();
        return view('clientes/clientes', compact('clientes'));
    }

    public function cadastrar()
    {
        $cliente = new clientesModel();
        if ($_POST['tipo_pessoa'] == 'pf') {
            $cliente->setNome_fantasia($_POST['nome']);
            $cliente->setRazao_social($_POST['nome']);
            $cliente->setTipo_pessoa('pessoa_fisica');
        } else {
            $cliente->setNome_fantasia($_POST['nome_fantasia']);
            $cliente->setRazao_social($_POST['razao_social']);
            $cliente->setTipo_pessoa('pessoa_juridica');
        }
        $cliente->setCpf_cnpj($_POST['cpf_cnpj']);
        $cliente->setTelefone($_POST['telefone']);
        $cliente->setCelular($_POST['celular']);
        $cliente->setWhatsapp($_POST['whatsapp']);
        $cliente->setEmail($_POST['email']);
        $cliente->setCep($_POST['cep']);
        $cliente->setEndereco($_POST['endereco']);
        $cliente->setNumero($_POST['numero']);
        $cliente->setComplemento($_POST['complemento']);
        $cliente->setBairro($_POST['bairro']);
        $cliente->setCidade($_POST['cidade']);
        $cliente->setEstado($_POST['estado']);
        $credito = DB::table('parametros_de_venda')->select('valor')->where('id_parametro', '=', '3')->first();
        $credito = $credito->valor;
        $cliente->setCredito($credito);
        date_default_timezone_set('America/Sao_Paulo');
        $cliente->setData_cadastro(date('Y-m-d H:i:s'));
        $cliente->setStatus('1');
        $cliente->cadastrar();
        $resposta = array('resposta' => $cliente->getResposta());
        return Response()->json($resposta);
    }

    public function excluir()
    {
        $cliente = new clientesModel();
        $cliente->setId_cliente($_POST['id_cliente']);
        $cliente->excluir();
        $resposta = array('resposta' => $cliente->getResposta());
        return Response()->json($resposta);
    }

    public function verificarCliente()
    {
        $cliente = new clientesModel();
        $cliente->setCpf_cnpj($_POST['cpf_cnpj']);
        $cliente->verificarCliente();
        $resposta = array('resposta' => $cliente->getResposta());
        return Response()->json($resposta);
    }

    public function visualizar()
    {
        if (isset($_GET['cliente']) && !empty($_GET['cliente'])) {
            $valida_clente = DB::table('clientes')->where('id_cliente', '=', $_GET['cliente'])->count();
            if ($valida_clente != 0) {
                $dados_cliente = DB::table('clientes')->where('id_cliente', '=', $_GET['cliente'])->get();
                if (isset($_GET['alterar'])) {
                    return view('clientes/alterar', compact('dados_cliente'));
                } else {
                    return view('clientes/visualizar', compact('dados_cliente'));
                }
            } else {
                return redirect()->route('clientes');
            }
        } else {
            return redirect()->route('clientes');
        }
    }
}
