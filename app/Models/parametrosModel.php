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


    public function getId_categoria()
    {
        return $this->id_categoria;
    }

    public function setId_categoria($id_categoria)
    {
        $this->id_categoria = $id_categoria;

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
        if (!empty($this->getNome())) {
            $verifica_categoria = DB::table('categoria')->select('id_categoria')->where('descricao', '=', $_POST['nomeCategoria']);
            if ($verifica_categoria->get()->contains('id_categoria', $this->getId_categoria()) || $verifica_categoria->count() == 0) {
                DB::table('categoria')->where('id_categoria', '=', $this->getId_categoria())->update([
                    'nome' => $this->getNome(),
                ]);
                $this->setResposta('alterado');
            } else {
                $this->setResposta('categoria_cadastrado');
            }
        } else {
            $this->setResposta('vazio');
        }              
    }
}
