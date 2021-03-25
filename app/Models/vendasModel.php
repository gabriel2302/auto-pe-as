<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class vendasModel extends Model
{
    use HasFactory;
    private $id_venda;
    private $usuario_id;
    private $cliente_id;
    private $forma_pagamento;
    private $desconto;
    private $valor_total;
    private $comissao;
    private $valor_comissao;
    private $data_venda;
    private $status;

    private $node_produto;
    private $produtos;

    private $resposta;

    public function getId_venda()
    {
        return $this->id_venda;
    }

    public function setId_venda($id_venda)
    {
        $this->id_venda = $id_venda;

        return $this;
    }

    public function getUsuario_id()
    {
        return $this->usuario_id;
    }

    public function setUsuario_id($usuario_id)
    {
        $this->usuario_id = $usuario_id;

        return $this;
    }

    public function getCliente_id()
    {
        return $this->cliente_id;
    }

    public function setCliente_id($cliente_id)
    {
        $this->cliente_id = $cliente_id;

        return $this;
    }

    public function getForma_pagamento()
    {
        return $this->forma_pagamento;
    }

    public function setForma_pagamento($forma_pagamento)
    {
        $this->forma_pagamento = $forma_pagamento;

        return $this;
    }

    public function getDesconto()
    {
        return $this->desconto;
    }

    public function setDesconto($desconto)
    {
        $this->desconto = $desconto;

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

    public function getComissao()
    {
        return $this->comissao;
    }

    public function setComissao($comissao)
    {
        $this->comissao = $comissao;

        return $this;
    }

    public function getValor_comissao()
    {
        return $this->valor_comissao;
    }

    public function setValor_comissao($valor_comissao)
    {
        $this->valor_comissao = $valor_comissao;

        return $this;
    }

    public function getData_venda()
    {
        return $this->data_venda;
    }

    public function setData_venda($data_venda)
    {
        $this->data_venda = $data_venda;

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

    public function getNode_produto()
    {
        return $this->node_produto;
    }

    public function setNode_produto($node_produto)
    {
        $this->node_produto = $node_produto;

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

    public function getResposta()
    {
        return $this->resposta;
    }

    public function setResposta($resposta)
    {
        $this->resposta = $resposta;

        return $this;
    }

    public function efetuar()
    {
        if (!empty($this->getCliente_id()) && !empty($this->getUsuario_id()) && !empty($this->getValor_total())) {
            $valida_produto = 0;
            if ($this->getNode_produto() != NULL) {
                foreach ($this->getNode_produto() as $node) {
                    if ($this->getProdutos() == NULL) {
                        $valida_produto = 1;
                    } else {
                        if (empty($this->getProdutos()[$node]['produto_id']) || empty($this->getProdutos()[$node]['quantidade']) || empty($this->getProdutos()[$node]['valor_unitario']) || empty($this->getProdutos()[$node]['valor_total'])) {
                            $valida_produto = 1;
                        }
                    }
                }
            } else {
                $valida_produto = 1;
            }
            if ($valida_produto == 0) {
                $porcentagem_comissao = DB::table('parametros_de_venda')->where('id_parametro', '=', '1')->select('valor')->first();
                $this->setComissao($porcentagem_comissao->valor);
                $this->setValor_comissao($this->getValor_total() * ($this->getComissao() / 100));
                $valor_desconto = DB::table('parametros_de_venda')->where('id_parametro', '=', '2')->first();
                if ($this->getDesconto() <= $valor_desconto->valor) {
                    $this->setId_venda(DB::table('vendas')->insertGetId([
                        'usuario_id' => $this->getUsuario_id(),
                        'cliente_id' => $this->getCliente_id(),
                        'desconto' => $this->getDesconto(),
                        'valor_total' => $this->getValor_total(),
                        'comissao' => $this->getComissao(),
                        'valor_comissao' => $this->getValor_comissao(),
                        'data_venda' => $this->getData_venda(),
                        'status' => $this->getStatus()
                    ]));

                    foreach ($this->getNode_produto() as $node) {
                        DB::table('itens_venda')->insert([
                            'venda_id' => $this->getId_venda(),
                            'produto_id' => $this->getProdutos()[$node]['produto_id'],
                            'quantidade' => $this->getProdutos()[$node]['quantidade'],
                            'valor_unitario' => $this->getProdutos()[$node]['valor_unitario'],
                            'valor_total' => $this->getProdutos()[$node]['valor_total'],
                            'status' => $this->getStatus()
                        ]);
                    }

                    $this->setResposta('cadastrado');
                } else {
                    $this->setResposta('desconto_maior');
                }
            } else {
                $this->setResposta('produto_vazio');
            }
        } else {
            $this->setResposta('vazio');
        }
    }

    public function finalizar()
    {
        if ($this->getForma_pagamento() == 'interno') {
            $valor = DB::table('vendas')->where('id_venda', '=', $this->getId_venda())->first();
            $credito = DB::table('clientes')->where('id_cliente', '=', $this->getCliente_id())->first();

            DB::table('clientes')->where('id_cliente', '=', $this->getCliente_id())->update([
                'credito' => ($credito->credito - $valor->valor_total),
                'credito_utilizado' => ($credito->credito_utilizado + $valor->valor_total)
            ]);

            DB::table('vendas')->where('id_venda', '=', $this->getId_venda())->update([
                'forma_pagamento' => $this->getForma_pagamento(),
                'status' => '1'
            ]);
            $this->setResposta('cadastrado');
        } else {
            DB::table('vendas')->where('id_venda', '=', $this->getId_venda())->update([
                'forma_pagamento' => $this->getForma_pagamento(),
                'status' => '1'
            ]);
            $this->setResposta('cadastrado');
        }
    }

    public function excluir()
    {
        $venda = DB::table('vendas')->where('id_venda', '=', $this->getId_venda())->first();
        $cliente = DB::table('clientes')->where('id_cliente', '=', $venda->cliente_id)->first();
        $itens_venda = DB::table('itens_venda')->where('venda_id', '=', $this->getId_venda())->get();
        $produtos = DB::table('produtos')->get();

        if ($venda->forma_pagamento == 'interno') {
            DB::table('vendas')->where('id_venda', '=', $this->getId_venda())->update([
                'status' => '0'
            ]);

            foreach ($produtos as $produto) {
                foreach ($itens_venda as $item) {
                    if ($item->produto_id == $produto->id_produto) {
                        DB::table('produtos')->where('id_produto', '=', $item->produto_id)->update([
                            'quantidade' => ($produto->quantidade + $item->quantidade)
                        ]);
                    }
                }
            }

            DB::table('clientes')->where('id_cliente', '=', $venda->cliente_id)->update([
                'credito' => ($cliente->credito + $venda->valor_total),
                'credito_utilizado' => ($cliente->credito_utilizado - $venda->valor_total)
            ]);

            $this->setResposta('excluido_credito');
        } else {
            DB::table('vendas')->where('id_venda', '=', $this->getId_venda())->update([
                'status' => '0'
            ]);

            foreach ($produtos as $produto) {
                foreach ($itens_venda as $item) {
                    if ($item->produto_id == $produto->id_produto) {
                        DB::table('produtos')->where('id_produto', '=', $item->produto_id)->update([
                            'quantidade' => ($produto->quantidade + $item->quantidade)
                        ]);
                    }
                }
            }
            $this->setResposta('excluido');
        }
    }
}
