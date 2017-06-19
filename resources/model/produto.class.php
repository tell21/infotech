<?php
include_once'estoque.class.php';
include_once'categoria.class.php';
include_once'imagem.class.php';
class Produto{
    private $id;
    private $nome;
    private $descricao;
    private $preco;
    private $estoque;
    private $imagens;
    private $categoria;
    private $cadastro;

    public function construct(){
        $imagens = array();
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

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getDescricao(){
        return $this->descricao;
    }

    public function setPreco($preco){
        $this->preco = $preco;
    }

    public function getPreco(){
        return $this->preco;
    }

    public function setEstoque($estoque){
        $this->estoque = $estoque;
    }

    public function getEstoque(){
        return $this->estoque;
    }

    public function setImagens($imagens){
        $this->imagens = $imagens;
    }

    public function getImagens(){
        return $this->imagens;
    }

    public function addImagem($imagem){
        array_push($this->imagens, $imagem);
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }

    public function getCategoria(){
        return $this->categoria;
    }

    public function getCadastro(){
        return $this->cadastro;
    }

    public function setCadastro($cadastro){
        $this->cadastro = $cadastro;
    }
}
?>