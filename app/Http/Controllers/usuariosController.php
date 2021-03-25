<?php

namespace App\Http\Controllers;

use App\Models\usuariosModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class usuariosController extends Controller
{
    public function alterar()
    {
        $usuarios = new usuariosModel();
        $usuarios->setId_usuario($_POST['id_usuario']);
        $usuarios->setNome($_POST['nome']);
        $usuarios->setCpf($_POST['cpf']);
        $usuarios->setTelefone($_POST['telefone']);
        $usuarios->setCelular($_POST['celular']);
        $usuarios->setWhatsapp($_POST['whatsapp']);
        $usuarios->setEmail($_POST['email']);
        $usuarios->setCep($_POST['cep']);
        $usuarios->setEndereco($_POST['endereco']);
        $usuarios->setNumero($_POST['numero']);
        $usuarios->setComplemento($_POST['complemento']);
        $usuarios->setBairro($_POST['bairro']);
        $usuarios->setCidade($_POST['cidade']);
        $usuarios->setEstado($_POST['estado']);
        $usuarios->setFuncao_id($_POST['funcao_id']);
        !empty($_POST['senha'])?$usuarios->setSenha(password_hash($_POST['senha'], PASSWORD_DEFAULT)):$usuarios->setSenha(NULL);
        $usuarios->setStatus($_POST['status']);
        $usuarios->alterar();
        $resposta = array('resposta' => $usuarios->getResposta());
        return Response()->json($resposta);
    }

    public function ativar()
    {
        $usuarios = new usuariosModel();
        $usuarios->setId_usuario($_POST['id_usuarios']);
        $usuarios->ativar();
        $resposta = array('resposta' => $usuarios->getResposta());
        return Response()->json($resposta);
    }

    public function buscar()
    {
        $usuarios = DB::table('usuarios')->get();
        $funcoes = DB::table('funcao')->get();
        return view('usuarios/usuarios', compact('usuarios', 'funcoes'));
    }

    public function cadastrar()
    {
        $usuarios = new usuariosModel();
        $usuarios->setNome($_POST['nome']);
        $usuarios->setCpf($_POST['cpf']);
        $usuarios->setTelefone($_POST['telefone']);
        $usuarios->setCelular($_POST['celular']);
        $usuarios->setWhatsapp($_POST['whatsapp']);
        $usuarios->setEmail($_POST['email']);
        $usuarios->setCep($_POST['cep']);
        $usuarios->setEndereco($_POST['endereco']);
        $usuarios->setNumero($_POST['numero']);
        $usuarios->setComplemento($_POST['complemento']);
        $usuarios->setBairro($_POST['bairro']);
        $usuarios->setCidade($_POST['cidade']);
        $usuarios->setEstado($_POST['estado']);
        $usuarios->setFuncao_id($_POST['funcao_id']);
        $usuarios->setSenha(password_hash($_POST['senha'], PASSWORD_DEFAULT));
        $usuarios->setStatus('1');
        $usuarios->cadastrar();
        $resposta = array('resposta' => $usuarios->getResposta());
        return Response()->json($resposta);
    }

    public function excluir()
    {
        $usuarios = new usuariosModel();
        $usuarios->setId_usuario($_POST['id_usuarios']);
        $usuarios->excluir();
        $resposta = array('resposta' => $usuarios->getResposta());
        return Response()->json($resposta);
    }

    public function login(){
        $usuarios = new usuariosModel();
        $usuarios->setEmail($_POST['email']);
        $usuarios->setSenha($_POST['senha']);
        $usuarios->login();
        $resposta = array('resposta' => $usuarios->getResposta());
        return Response()->json($resposta);
    }

    public function logout(Request $request){
        if($request->session()->exists('usuario_id')){
            Session::flush();
            return redirect()->route('login');
        }
    }

    public function verificarusuarios()
    {
        $usuarios = new usuariosModel();
        $usuarios->setCpf($_POST['cpf']);
        $usuarios->verificarusuarios();
        $resposta = array('resposta' => $usuarios->getResposta());
        return Response()->json($resposta);
    }

    public function visualizar()
    {
        if (isset($_GET['usuarios']) && !empty($_GET['usuarios'])) {
            $valida_clente = DB::table('usuarios')->where('id_usuario', '=', $_GET['usuarios'])->count();
            if ($valida_clente != 0) {
                $usuarios = DB::table('usuarios')->where('id_usuario', '=', $_GET['usuarios'])->get();
                if (isset($_GET['alterar'])) {
                    $funcoes = DB::table('funcao')->get();
                    return view('usuarios/alterar', compact('usuarios', 'funcoes'));
                } else {
                    $funcoes = DB::table('funcao')->get();
                    return view('usuarios/visualizar', compact('usuarios', 'funcoes'));
                }
            } else {
                return redirect()->route('usuarios');
            }
        } else {
            return redirect()->route('usuarios');
        }
    }
}
