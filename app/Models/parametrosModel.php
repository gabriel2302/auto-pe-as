<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class parametrosModel extends Model
{
    use HasFactory;

    private $nomeMarca;
    private $resposta;
    private $nomeCategoria;
    private $id_categoria;
    private $id;
    private $valor;
    private $id_marca;
    private $descricao;
    private $id_parametro;


    public function getId_categoria()
    {
        return $this->id_categoria;
    }

    public function setId_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;

        return $this;
    }

    public function getId_marca()
    {
        return $this->id_marca;
    }

    public function setId_marca($id_marca)
    {
        $this->id_marca = $id_marca;

        return $this;
    }

    public function getNomemarca()
    {
        return $this->descricao;
    }

    public function setNomemarca($nomeMarca)
    {
        $this->descricao = $nomeMarca;

        return $this;
    }

    public function getNome()
    {
        return $this->descricao;
    }

    public function setNome($nomeMarca)
    {
        $this->descricao = $nomeMarca;

        return $this;
    }

    public function getNomecategoria()
    {
        return $this->descricao;
    }

    public function setNomecategoria($nomeCategoria)
    {
        $this->descricao = $nomeCategoria;

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

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;

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

    public function getDescricao()
    {
        return $this->descricao;
    }

    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    public function getId_parametro()
    {
        return $this->id_parametro;
    }

    public function setId_parametro($id_parametro)
    {
        $this->id_parametro = $id_parametro;

        return $this;
    }

    //Marcas

    public function ativarMarca()
    {
        if (!empty($this->getId_marca())) {
            DB::table('marca')->where('id_marca', '=', $this->getId_marca())->update([
                'status' => '1'
            ]);
            $this->setResposta('ativado');
        }
    }

    public function excluirMarca()
    {
        if (!empty($this->getId_marca())) {
            DB::table('marca')->where('id_marca', '=', $this->getId_marca())->delete();
            $this->setResposta('excluido');
        }
    }

    public function alterarMarca()
    {
        if (!empty($this->getId_marca())) {
            if (!empty($this->getDescricao())) {
                $verifica_marca = DB::table('marca')->select('id_marca')->where('descricao', '=', $this->getDescricao());
                if ($verifica_marca->get()->contains('id_marca', $this->getId_marca()) || $verifica_marca->count() == 0) {
                    DB::table('marca')->where('id_marca', '=', $this->getId_marca())->update([
                        'descricao' => $this->getDescricao(),
                    ]);
                    $this->setResposta('alterado');
                } else {
                    $this->setResposta('marca_cadastrada');
                }
            } else {
                $this->setResposta('vazio');
            }
        } else {
            $this->setResposta('vazio');
        }
    }

    public function cadastrarMarca()
    {
        if (!empty($this->getDescricao())) {
            $verifica_marca = DB::table('marca')->select('id_marca')->where('descricao', '=', $this->getDescricao());
            if ($verifica_marca->get()->contains('id_marca', $this->getId_marca()) || $verifica_marca->count() == 0) {
                DB::table('marca')->insert([
                    'descricao' => $this->getDescricao(),
                    'status' => '1'
                ]);
                $this->setResposta('cadastrado');
            } else {
                $this->setResposta('marca_cadastrada');
            }
        } else {
            $this->setResposta('vazio');
        }
    }


    //Categorias

    public function ativarCategoria()
    {
        if (!empty($this->getId_categoria())) {
            DB::table('categoria')->where('id_categoria', '=', $this->getId_categoria())->update([
                'status' => '1'
            ]);
            $this->setResposta('ativado');
        }
    }

    public function excluirCategoria()
    {
        if (!empty($this->getId_categoria())) {
            DB::table('categoria')->where('id_categoria', '=', $this->getId_categoria())->delete();
            $this->setResposta('excluido');
        }
    }

    public function alterarCategoria()
    {
        if (!empty($this->getId_categoria())) {
            if (!empty($this->getDescricao())) {
                $verifica_categoria = DB::table('categoria')->select('id_categoria')->where('descricao', '=', $this->getDescricao());
                if ($verifica_categoria->get()->contains('id_categoria', $this->getId_categoria()) || $verifica_categoria->count() == 0) {
                    DB::table('categoria')->where('id_categoria', '=', $this->getId_categoria())->update([
                        'descricao' => $this->getDescricao(),
                    ]);
                    $this->setResposta('alterado');
                } else {
                    $this->setResposta('categoria_cadastrada');
                }
            } else {
                $this->setResposta('vazio');
            }
        } else {
            $this->setResposta('vazio');
        }
    }

    public function cadastrarCategoria()
    {
        if (!empty($this->getDescricao())) {
            $verifica_categoria = DB::table('categoria')->select('id_categoria')->where('descricao', '=', $this->getDescricao());
            if ($verifica_categoria->get()->contains('id_categoria', $this->getId_categoria()) || $verifica_categoria->count() == 0) {
                DB::table('categoria')->insert([
                    'descricao' => $this->getDescricao(),
                    'status' => '1'
                ]);
                $this->setResposta('cadastrado');
            } else {
                $this->setResposta('categoria_cadastrada');
            }
        } else {
            $this->setResposta('vazio');
        }
    }

    public function alterarParametro()
    {
        if (!empty($this->getValor())) {
            DB::table('parametros_de_venda')->where('id_parametro', '=', $this->getId_parametro())->update([
                'valor' => $this->getValor(),
            ]);
            $this->setResposta('alterado');
        } else {
            $this->setResposta('vazio');
        }
    }
}
