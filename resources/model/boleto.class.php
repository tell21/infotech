<?php
class Boleto {
    private $codigoDeBarras;
    private $emissao;
    private $vencimento;

    public function construct(){

    }

    public function setCodigoDeBarras($codigoDeBarras){
        $this->codigoDeBarras = $codigoDeBarras;
    }

    public function getCodigoDeBarras(){
        return $this->codigoDeBarras;
    }

    public function setEmissao($emissao){
        $this->emissao = $emissao;
    }

    public function getEmissao(){
        return $this->emissao;
    }

    public function setVencimento($vencimento){
        $this->vencimento = $vencimento;
    }

    public function getVencimento(){
        return $this->vencimento;
    }
}
?>