<?php
include_once'produto.class.php';
class Compra{
    private $id;
    private $data;
    private $valor;
    private $quantidade;
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

    public function setValor($valor){
        $this->data = $data;
    }

    public function getValor(){
        return $this->valor;
    }
    
    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }

    public function setProduto($produto){
        $this->produto = $produto;
    }

    public function getProduto(){
        return $this->produto;
    }
}
?>