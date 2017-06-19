<?php
include_once'cadastro.class.php';
class Categoria{
    private $id;
    private $nome;
    private $cadastro;

    public function construct(){
      $cadastro = new Cadastro();
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setCadastro($cadastro){
        $this->cadastro = $cadastro;
    }

    public function getCadastro(){
        return $this->cadastro;
    }
}
?>
