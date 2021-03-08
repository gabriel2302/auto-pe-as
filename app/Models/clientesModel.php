<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class clientesModel extends Model
{
    use HasFactory;

    private $id_cliente;
    private $nome_fantasia;
    private $razao_social;
    private $cpf_cnpj;
    private $telefone;
    private $celular;
    private $whatsapp;
    private $email;
    private $cep;
    private $endereco;
    private $numero;
    private $complemento;
    private $bairro;
    private $cidade;
    private $estado;
    private $tipo_pessoa;
    private $credito;
    private $credito_utilizado;
    private $status;
    private $data_cadastro;
    private $data_alteracao;
    private $resposta;


    public function getId_cliente()
    {
        return $this->id_cliente;
    }

    public function setId_cliente($id_cliente)
    {
        $this->id_cliente = $id_cliente;

        return $this;
    }

    public function getNome_fantasia()
    {
        return $this->nome_fantasia;
    }

    public function setNome_fantasia($nome_fantasia)
    {
        $this->nome_fantasia = $nome_fantasia;

        return $this;
    }

    public function getRazao_social()
    {
        return $this->razao_social;
    }

    public function setRazao_social($razao_social)
    {
        $this->razao_social = $razao_social;

        return $this;
    }

    public function getCpf_cnpj()
    {
        return $this->cpf_cnpj;
    }

    public function setCpf_cnpj($cpf_cnpj)
    {
        $this->cpf_cnpj = $cpf_cnpj;

        return $this;
    }

    public function getTelefone()
    {
        return $this->telefone;
    }

    public function setTelefone($telefone)
    {
        $this->telefone = $telefone;

        return $this;
    }

    public function getCelular()
    {
        return $this->celular;
    }

    public function setCelular($celular)
    {
        $this->celular = $celular;

        return $this;
    }

    public function getWhatsapp()
    {
        return $this->whatsapp;
    }

    public function setWhatsapp($whatsapp)
    {
        $this->whatsapp = $whatsapp;

        return $this;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    public function getCep()
    {
        return $this->cep;
    }

    public function setCep($cep)
    {
        $this->cep = $cep;

        return $this;
    }

    public function getEndereco()
    {
        return $this->endereco;
    }

    public function setEndereco($endereco)
    {
        $this->endereco = $endereco;

        return $this;
    }

    public function getNumero()
    {
        return $this->numero;
    }

    public function setNumero($numero)
    {
        $this->numero = $numero;

        return $this;
    }

    public function getComplemento()
    {
        return $this->complemento;
    }

    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    public function getBairro()
    {
        return $this->bairro;
    }

    public function setBairro($bairro)
    {
        $this->bairro = $bairro;

        return $this;
    }

    public function getCidade()
    {
        return $this->cidade;
    }

    public function setCidade($cidade)
    {
        $this->cidade = $cidade;

        return $this;
    }

    public function getEstado()
    {
        return $this->estado;
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;

        return $this;
    }

    public function getTipo_pessoa()
    {
        return $this->tipo_pessoa;
    }

    public function setTipo_pessoa($tipo_pessoa)
    {
        $this->tipo_pessoa = $tipo_pessoa;

        return $this;
    }

    public function getCredito()
    {
        return $this->credito;
    }

    public function setCredito($credito)
    {
        $this->credito = $credito;

        return $this;
    }

    public function getCredito_utilizado()
    {
        return $this->credito_utilizado;
    }

    public function setCredito_utilizado($credito_utilizado)
    {
        $this->credito_utilizado = $credito_utilizado;

        return $this;
    }

    public function getData_cadastro()
    {
        return $this->data_cadastro;
    }

    public function setData_cadastro($data_cadastro)
    {
        $this->data_cadastro = $data_cadastro;

        return $this;
    }

    public function getData_alteracao()
    {
        return $this->data_alteracao;
    }

    public function setData_alteracao($data_alteracao)
    {
        $this->data_alteracao = $data_alteracao;

        return $this;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus($status)
    {
        $this->status = $status;

        return $this;
    }

    public function getResposta()
    {
        return $this->resposta;
    }

    public function setResposta($resposta)
    {
        $this->resposta = $resposta;

        return $this;
    }

    public function cadastrar()
    {
        require(public_path('template/php/validaCPF.php'));
        require(public_path('template/php/validaCNPJ.php'));

        if (!empty($this->getCpf_cnpj())) {
            if (strlen($this->getCpf_cnpj()) <= 14) {
                if (valida_cpf($this->getCpf_cnpj())) {
                    if (!empty($this->getNome_fantasia()) && !empty($this->getRazao_social()) && !empty($this->getCpf_cnpj()) && !empty($this->getCep()) && !empty($this->getEndereco()) && !empty($this->getNumero()) && !empty($this->getBairro()) && !empty($this->getCidade()) && !empty($this->getEstado())) {
                        $verifica_cliente = DB::table('clientes')->where('cpf_cnpj', '=', $_POST['cpf_cnpj'])->select('id_cliente')->count();
                        if ($verifica_cliente <= 0) {
                            DB::table('clientes')->insert([
                                'nome_fantasia' => $this->getNome_fantasia(),
                                'razao_social' => $this->getRazao_social(),
                                'cpf_cnpj' => $this->getCpf_cnpj(),
                                'telefone' => $this->getTelefone(),
                                'celular' => $this->getCelular(),
                                'whatsapp' => $this->getWhatsapp(),
                                'email' => $this->getEmail(),
                                'cep' => $this->getCep(),
                                'endereco' => $this->getEndereco(),
                                'numero' => $this->getNumero(),
                                'complemento' => $this->getComplemento(),
                                'bairro' => $this->getBairro(),
                                'cidade' => $this->getCidade(),
                                'estado' => $this->getEstado(),
                                'tipo_pessoa' => $this->getTipo_pessoa(),
                                'credito' => $this->getCredito(),
                                'data_cadastro' => $this->getData_cadastro(),
                                'status' => $this->getStatus(),
                            ]);
                            $this->setResposta('cadastrado');
                        } else {
                            $this->setResposta('cliente_cadastrado');
                        }
                    } else {
                        $this->setResposta('vazio');
                    }
                } else {
                    $this->setResposta('cpf_cnpj_invalido');
                }
            } else {
                if (valida_cnpj($this->getCpf_cnpj())) {
                    if (!empty($this->getNome_fantasia()) && !empty($this->getRazao_social()) && !empty($this->getCpf_cnpj()) && !empty($this->getCep()) && !empty($this->getEndereco()) && !empty($this->getNumero()) && !empty($this->getBairro()) && !empty($this->getCidade()) && !empty($this->getEstado())) {
                        $verifica_cliente = DB::table('clientes')->where('cpf_cnpj', '=', $_POST['cpf_cnpj'])->select('id_cliente')->count();
                        if ($verifica_cliente <= 0) {
                            DB::table('clientes')->insert([
                                'nome_fantasia' => $this->getNome_fantasia(),
                                'razao_social' => $this->getRazao_social(),
                                'cpf_cnpj' => $this->getCpf_cnpj(),
                                'telefone' => $this->getTelefone(),
                                'celular' => $this->getCelular(),
                                'whatsapp' => $this->getWhatsapp(),
                                'email' => $this->getEmail(),
                                'cep' => $this->getCep(),
                                'endereco' => $this->getEndereco(),
                                'numero' => $this->getNumero(),
                                'complemento' => $this->getComplemento(),
                                'bairro' => $this->getBairro(),
                                'cidade' => $this->getCidade(),
                                'estado' => $this->getEstado(),
                                'tipo_pessoa' => $this->getTipo_pessoa(),
                                'credito' => $this->getCredito(),
                                'data_cadastro' => $this->getData_cadastro(),
                                'status' => $this->getStatus(),
                            ]);
                            $this->setResposta('cadastrado');
                        } else {
                            $this->setResposta('cliente_cadastrado');
                        }
                    } else {
                        $this->setResposta('vazio');
                    }
                } else {
                    $this->setResposta('cpf_cnpj_invalido');
                }
            }
        } else {
            $this->setResposta('vazio');
        }
    }

    public function alterar()
    {
        require(public_path('template/php/validaCPF.php'));
        require(public_path('template/php/validaCNPJ.php'));

        if (!empty($this->getCpf_cnpj())) {
            if (strlen($this->getCpf_cnpj()) <= 14) {
                if (valida_cpf($this->getCpf_cnpj())) {
                    if (!empty($this->getNome_fantasia()) && !empty($this->getRazao_social()) && !empty($this->getCpf_cnpj()) && !empty($this->getCep()) && !empty($this->getEndereco()) && !empty($this->getNumero()) && !empty($this->getBairro()) && !empty($this->getCidade()) && !empty($this->getEstado())) {
                        $verifica_cliente = DB::table('clientes')->select('id_cliente')->where('cpf_cnpj', '=', $_POST['cpf_cnpj']);
                        if ($verifica_cliente->get()->contains('id_cliente', $this->getId_cliente()) || $verifica_cliente->count() == 0) {
                            DB::table('clientes')->where('id_cliente', '=', $this->getId_cliente())->insert([
                                'nome_fantasia' => $this->getNome_fantasia(),
                                'razao_social' => $this->getRazao_social(),
                                'cpf_cnpj' => $this->getCpf_cnpj(),
                                'telefone' => $this->getTelefone(),
                                'celular' => $this->getCelular(),
                                'whatsapp' => $this->getWhatsapp(),
                                'email' => $this->getEmail(),
                                'cep' => $this->getCep(),
                                'endereco' => $this->getEndereco(),
                                'numero' => $this->getNumero(),
                                'complemento' => $this->getComplemento(),
                                'bairro' => $this->getBairro(),
                                'cidade' => $this->getCidade(),
                                'estado' => $this->getEstado(),
                                'data_alteracao' => $this->getData_alteracao(),
                                'status' => $this->getStatus(),
                            ]);
                            $this->setResposta('alterado');
                        } else {
                            $this->setResposta('cliente_cadastrado');
                        }
                    } else {
                        $this->setResposta('vazio');
                    }
                } else {
                    $this->setResposta('cpf_cnpj_invalido');
                }
            } else {
                if (valida_cnpj($this->getCpf_cnpj())) {
                    if (!empty($this->getNome_fantasia()) && !empty($this->getRazao_social()) && !empty($this->getCpf_cnpj()) && !empty($this->getCep()) && !empty($this->getEndereco()) && !empty($this->getNumero()) && !empty($this->getBairro()) && !empty($this->getCidade()) && !empty($this->getEstado())) {
                        $verifica_cliente = DB::table('clientes')->select('id_cliente')->where('cpf_cnpj', '=', $_POST['cpf_cnpj']);
                        if ($verifica_cliente->get()->contains('id_cliente', $this->getId_cliente()) || $verifica_cliente->count() == 0) {
                            DB::table('clientes')->where('id_cliente', '=', $this->getId_cliente())->update([
                                'nome_fantasia' => $this->getNome_fantasia(),
                                'razao_social' => $this->getRazao_social(),
                                'cpf_cnpj' => $this->getCpf_cnpj(),
                                'telefone' => $this->getTelefone(),
                                'celular' => $this->getCelular(),
                                'whatsapp' => $this->getWhatsapp(),
                                'email' => $this->getEmail(),
                                'cep' => $this->getCep(),
                                'endereco' => $this->getEndereco(),
                                'numero' => $this->getNumero(),
                                'complemento' => $this->getComplemento(),
                                'bairro' => $this->getBairro(),
                                'cidade' => $this->getCidade(),
                                'estado' => $this->getEstado(),
                                'data_alteracao' => $this->getData_alteracao(),
                                'status' => $this->getStatus(),
                            ]);
                            $this->setResposta('alterado');
                        } else {
                            $this->setResposta('cliente_cadastrado');
                        }
                    } else {
                        $this->setResposta('vazio');
                    }
                } else {
                    $this->setResposta('cpf_cnpj_invalido');
                }
            }
        } else {
            $this->setResposta('vazio');
        }
    }

    public function verificarCliente()
    {
        require(public_path('template/php/validaCPF.php'));
        require(public_path('template/php/validaCNPJ.php'));

        if (!empty($this->getCpf_cnpj())) {
            if (strlen($this->getCpf_cnpj()) <= 14) {
                if (valida_cpf($this->getCpf_cnpj())) {
                    $verifica_cliente = DB::table('clientes')->where('cpf_cnpj', '=', $_POST['cpf_cnpj'])->select('id_cliente')->count();
                    if ($verifica_cliente >= 1) {
                        $this->setResposta('cliente_cadastrado');
                    } else {
                        $this->setResposta('cliente_nao_cadastrado');
                    }
                } else {
                    $this->setResposta('cpf_cnpj_invalido');
                }
            } else {
                if (valida_cnpj($this->getCpf_cnpj())) {
                    $verifica_cliente = DB::table('clientes')->where('cpf_cnpj', '=', $_POST['cpf_cnpj'])->select('id_cliente')->count();
                    if ($verifica_cliente >= 1) {
                        $this->setResposta('cliente_cadastrado');
                    } else {
                        $this->setResposta('cliente_nao_cadastrado');
                    }
                } else {
                    $this->setResposta('cpf_cnpj_invalido');
                }
            }
        } else {
            $this->setResposta('vazio');
        }
    }

    public function ativar()
    {
        if (!empty($this->getId_cliente())) {
            DB::table('clientes')->where('id_cliente', '=', $this->getId_cliente())->update([
                'status' => '1'
            ]);
            $this->setResposta('ativado');
        }
    }

    public function excluir()
    {
        if (!empty($this->getId_cliente())) {
            DB::table('clientes')->where('id_cliente', '=', $this->getId_cliente())->delete();
            $this->setResposta('excluido');
        }
    }
}
