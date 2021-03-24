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

    private $id_entrada;
    private $node_produtos;
    private $produtos;
    private $fornecedor;
    private $nota_fiscal;
    private $valor_total;
    private $data_entrada;

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

    public function getId_entrada()
    {
        return $this->id_entrada;
    }

    public function setId_entrada($id_entrada)
    {
        $this->id_entrada = $id_entrada;

        return $this;
    }

    public function getNode_produtos()
    {
        return $this->node_produtos;
    }

    public function setNode_produtos($node_produtos)
    {
        $this->node_produtos = $node_produtos;

        return $this;
    }

    public function getProdutos()
    {
        return $this->produtos;
    }

    public function setProdutos($produtos)
    {
        $this->produtos = $produtos;

        return $this;
    }

    public function getFornecedor()
    {
        return $this->fornecedor;
    }

    public function setFornecedor($fornecedor)
    {
        $this->fornecedor = $fornecedor;

        return $this;
    }

    public function getNota_fiscal()
    {
        return $this->nota_fiscal;
    }

    public function setNota_fiscal($nota_fiscal)
    {
        $this->nota_fiscal = $nota_fiscal;

        return $this;
    }

    public function getValor_total()
    {
        return $this->valor_total;
    }

    public function setValor_total($valor_total)
    {
        $this->valor_total = $valor_total;

        return $this;
    }

    public function getData_entrada()
    {
        return $this->data_entrada;
    }

    public function setData_entrada($data_entrada)
    {
        $this->data_entrada = $data_entrada;

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
                'quantidade' => '0',
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
            $vendas = DB::table('itens_venda')->where('produto_id', '=', $this->getId_produto())->count();
            $entradas = DB::table('itens_entrada_produto')->where('produto_id', '=', $this->getId_produto())->count();
            if ($vendas > 0 || $entradas > 0) {
                DB::table('produtos')->where('id_produto', '=', $this->getId_produto())->update([
                    'status' => '0'
                ]);
                $this->setResposta('excluido');
            } else {
                DB::table('produtos')->where('id_produto', '=', $this->getId_produto())->delete();
                $this->setResposta('excluido');
            }
        }
    }

    public function entradaCadastrar()
    {
        if (!empty($this->getFornecedor()) && !empty($this->getNode_produtos()) && !empty($this->getProdutos()) && !empty($this->getValor_total()) && !empty($this->getNota_fiscal())) {

            $validator = 0;
            foreach ($this->getNode_produtos() as $node_produto) {
                if (!empty($this->getProdutos()[$node_produto]['produto_id']) && !empty($this->getProdutos()[$node_produto]['quantidade']) && !empty($this->getProdutos()[$node_produto]['valor_unitario']) && !empty($this->getProdutos()[$node_produto]['valor_total']) && !empty($this->getProdutos()[$node_produto]['valor_venda'])) {
                    $validator = $validator;
                } else {
                    $validator = $validator + 1;
                }
            }

            if ($validator == 0) {
                $id = DB::table('entrada_produtos')->insertGetId([
                    'fornecedor' => $this->getFornecedor(),
                    'nota_fiscal' => $this->getNota_fiscal(),
                    'valor_total' => $this->getValor_total(),
                    'data_entrada' => $this->getData_entrada(),
                    'status' => '1'
                ]);
                $this->setId_entrada($id);
                foreach ($this->getNode_produtos() as $node_produto) {
                    DB::table('itens_entrada_produto')->insert([
                        'entrada_id' => $this->getId_entrada(),
                        'produto_id' => $this->getProdutos()[$node_produto]['produto_id'],
                        'quantidade' => $this->getProdutos()[$node_produto]['quantidade'],
                        'valor_unitario' => $this->getProdutos()[$node_produto]['valor_unitario'],
                        'valor_total' => $this->getProdutos()[$node_produto]['valor_total'],
                        'valor_venda' => $this->getProdutos()[$node_produto]['valor_venda'],
                        'status' => '1'
                    ]);

                    $qnt = DB::table('produtos')->where('id_produto', '=', $this->getProdutos()[$node_produto]['produto_id'])->select('quantidade')->first();
                    $qnt = $qnt->quantidade;

                    DB::table('produtos')->where('id_produto', '=', $this->getProdutos()[$node_produto]['produto_id'])->update([
                        'quantidade' => $this->getProdutos()[$node_produto]['quantidade'] + $qnt,
                        'valor' => $this->getProdutos()[$node_produto]['valor_venda'],
                    ]);
                }
                $this->setResposta('cadastrado');
            } else {
                $this->setResposta('vazio');
            }
        } else {
            $this->setResposta('vazio');
        }
    }
}
