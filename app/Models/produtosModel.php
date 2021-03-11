<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class produtosModel extends Model
{
    use HasFactory;
    private $id_produto;
    private $nome;
    private $valor;
    private $marca;
    private $categoria;
    private $descricao;
    private $status;
    private $resposta;

    public function getId_produto()
    {
        return $this->id_produto;
    }

    public function setId_produto($id_produto)
    {
        $this->id_produto = $id_produto;

        return $this;
    }

    public function getNome()
    {
        return $this->nome;
    }

    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    public function getValor()
    {
        return $this->valor;
    }

    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    public function getMarca()
    {
        return $this->marca;
    }

    public function setMarca($marca)
    {
        $this->marca = $marca;

        return $this;
    }

    public function getCategoria()
    {
        return $this->categoria;
    }

    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

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

    public function alterar()
    {
        if (!empty($this->getId_produto())) {
            if (!empty($this->getNome()) && !empty($this->getValor()) && !empty($this->getCategoria()) && !empty($this->getMarca())) {
                DB::table('produtos')->where('id_produto', '=', $this->getId_produto())->update([
                    'nome' => $this->getNome(),
                    'valor' => $this->getValor(),
                    'marca_id' => $this->getMarca(),
                    'categoria_id' => $this->getCategoria(),
                    'descricao' => $this->getDescricao(),
                ]);
                $this->setResposta('alterado');
            } else {
                $this->setResposta('vazio');
            }
        } else {
            $this->setResposta('vazio');
        }
    }

    public function cadastrar()
    {
        if (!empty($this->getNome()) && !empty($this->getValor()) && !empty($this->getCategoria()) && !empty($this->getMarca())) {
            DB::table('produtos')->insert([
                'nome' => $this->getNome(),
                'valor' => $this->getValor(),
                'marca_id' => $this->getMarca(),
                'categoria_id' => $this->getCategoria(),
                'descricao' => $this->getDescricao(),
                'status' => '1',
            ]);
            $this->setResposta('cadastrado');
        } else {
            $this->setResposta('vazio');
        }
    }

    public function ativar()
    {
        if (!empty($this->getId_produto())) {
            DB::table('produtos')->where('id_produto', '=', $this->getId_produto())->update([
                'status' => '1'
            ]);
            $this->setResposta('ativado');
        }
    }

    public function excluir()
    {
        if (!empty($this->getId_produto())) {
            DB::table('produtos')->where('id_produto', '=', $this->getId_produto())->delete();
            $this->setResposta('excluido');
        }
    }
}
