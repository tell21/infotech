<?php
class Estoque{
    private $quantidade;

    public function construct(){

    }

    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }

    public function getQuantidade(){
        return $this->quantidade;
    }
}
?>