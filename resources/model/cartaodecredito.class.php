<?php
class CartaoDeCredito{
    private $id;
    private $codigoDeSeguranca;
    private $numero;
    private $validade;

    public function construct(){

    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setCodigoDeSeguranca($codigoDeSeguranca){
        $this->codigoDeSeguranca = $codigoDeSeguranca;
    }

    public function setNumero($numero){
        $this->numero = $numero;
    }

    public function getNumero(){
        return $this->numero;
    }

    public function setValidade($validade){
        $this->validade = $validade;
    }

    public function getValidade(){
        return $this->validade;
    }
}
?>