<?php
include_once'suporte.class.php';
include_once'cartaodecredito.class.php';
include_once'cesta.class.php';
class Cliente{
    private $id;
    private $usuario;
    private $cpf;
    private $rg;
    private $suportes;
    private $cartoes;
    private $cestas;

    public function construct(){
        $suportes = array();
        $cartoes = array();
        $cestas = array();
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function setCpf($cpf){
        $this->cpf = $cpf;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function setRg($rg){
        $this->rg = $rg;
    }

    public function getRg(){
        return $this->rg;
    }

    public function addSuporte($suporte){
        array_push($this->suportes, $suporte);
    }

    public function getSuportes(){
        return $this->suportes;
    }

    public function setSuportes($suportes){
        $this->suportes = $suportes;
    }

    public function addCartao($cartao){
        array_push($this->cartoes, $cartao);
    }

    public function getCartoes(){
        return $this->cartoes;
    }

    public function setCartoes($cartoes){
        $this->cartoes = $cartoes;
    }

    public function addCesta($cesta){
        array_push($this->cestas, $cesta);
    }

    public function getCestas(){
        return $this->cestas;
    }

    public function setCestas($cestas){
        $this->cestas = $cestas;
    }
}
?>
