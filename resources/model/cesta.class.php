<?php
include_once'formadepagamento.class.php';
include_once'compra.class.php';
class Cesta {
    private $id;
    private $formaDePagamento;
    private $compras;
    private $valor;

    public function construct(){
        $compras = array();
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setValor($valor){
        $this->valor = $valor;
    }

    public function getValor(){
        return $this->valor;
    }

    public function setFormaDePagamento($formaDePagamento){
        $this->formaDePagamento = $formaDePagamento;
    }

    public function getFormaDePagamento(){
        return $this->formaDePagamento;
    }

    public function getCompras(){
        return $this->compras;
    }

    public function setCompras($compras){
        $this->compras = $compras;
    }

    public function addCompra($compra){
        array_push($this->compras, $compra);
    }
}
?>