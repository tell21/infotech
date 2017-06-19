<?php

class Suporte{
    private $id;
    private $descricao;
    private $assunto;

    public function construct(){

    }

    public function setDescricao($descricao){
        $this->descricao = $descricao;
    }

    public function getDescricao(){
        return $descricao;
    }

    public function setAssunto($assunto){
        $this->assunto = $assunto;
    }

    public function getAssunto(){
        return $this->assunto;
    }
}
?>