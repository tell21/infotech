<?php
include_once'cartaodecredito.class.php';
include_once'boleto.class.php';
class FormaDePagamento{
    private $cartao;
    private $boleto;
    private $status;

    //define('PENDENTE', '1');
    //define('CANCELADO', '2');
    //define('APROVADO', '3');

    public function construct(){

    }

    public function setCartao($cartao){
        $this->cartao = $cartao;
    }

    public function getCartao(){
        return $this->cartao;
    }

    public function setBoleto($boleto){
        $this->boleto = $boleto;
    }

    public function getBoleto(){
        return $this->boleto;
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function getStatus(){
        return $this->status;
    }
}
?>