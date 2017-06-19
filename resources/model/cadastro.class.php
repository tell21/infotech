<?php
include_once'categoria.class.php';
include_once'produto.class.php';
class Cadastro{
    private $id;
    private $data;
    private $categoria;
    private $produto;

    public function construct(){

    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setData($data){
        $this->data = $data;
    }

    public function getData(){
        return $this->data;
    }

    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }

    public function getCategoria(){
        return $this->categoria;
    }

    public function setProduto($produto){
        $this->produto = $produto;
    }

    public function getProduto(){
        return $this->produto;
    }
}
?>