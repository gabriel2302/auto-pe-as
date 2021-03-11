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
<<<<<<< HEAD
    private $id;
    private $valor;
=======
    private $id_marca;
>>>>>>> fef6f458ad24031894db3d31ea0d1aace429ceac


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

    public function cadastrarMarca()
    {                    
        if (!empty($this->getNome() ) ) {
            $verifica_marcas = DB::table('marca')->where('descricao', '=', $_POST['nomeMarca'])->select('id_marca')->count();
            if ($verifica_marcas <= 0) {
                DB::table('marca')->insert([
                    'descricao' => $this->getNome(),
                ]);
                $this->setResposta('cadastrado');
            } else {
                $this->setResposta('marca_cadastrado');
            }
        } else {
            $this->setResposta('vazio');
        }                           
    }

    public function cadastrarCategoria()
    {                    
        if (!empty($this->getNomecategoria() ) ) {
            $verifica_categoria = DB::table('categoria')->where('descricao', '=', $_POST['nomeCategoria'])->select('id_categoria')->count();
            if ($verifica_categoria <= 0) {
                DB::table('categoria')->insert([
                    'descricao' => $this->getNomecategoria(),
                ]);
                $this->setResposta('cadastrado');
            } else {
                $this->setResposta('categoria_cadastrado');
            }
        } else {
            $this->setResposta('vazio');
        }                           
    }

    public function alterarCategoria()
    {                       
        if (!empty($this->getNomecategoria())) {
            $verifica_categoria = DB::table('categoria')->select('id_categoria')->where('descricao', '=', $_POST['nomeCategoria']);
            if ($verifica_categoria->get()->contains('id_categoria', $this->getId_categoria()) || $verifica_categoria->count() == 0) {
                DB::table('categoria')->where('id_categoria', '=', $this->getId_categoria())->update([
                    'descricao' => $this->getNomecategoria(),
                ]);
                $this->setResposta('alterado');
            } else {
                $this->setResposta('categoria_cadastrado');
            }
        } else {
            $this->setResposta('vazio');
        }              
    }

<<<<<<< HEAD
    
    public function alterarParametro()
    {                       
        if (!empty($this->getValor())) {
            DB::table('pdv')->where('id', '=', $this->getId())->update([
                'valor' => $this->getValor(),
            ]);
            $this->setResposta('alterado');
=======
    public function alterarMarca()
    {                       
        if (!empty($this->getNomemarca())) {
            $verifica_marca = DB::table('marca')->select('id_marca')->where('descricao', '=', $_POST['nomeMarca']);
            if ($verifica_marca->get()->contains('id_marca', $this->getId_marca()) || $verifica_marca->count() == 0) {
                DB::table('marca')->where('id_marca', '=', $this->getId_marca())->update([
                    'descricao' => $this->getNomemarca(),
                ]);
                $this->setResposta('alterado');
            } else {
                $this->setResposta('marca_cadastrado');
            }
>>>>>>> fef6f458ad24031894db3d31ea0d1aace429ceac
        } else {
            $this->setResposta('vazio');
        }              
    }
<<<<<<< HEAD


=======
>>>>>>> fef6f458ad24031894db3d31ea0d1aace429ceac
}
