<?php

include_once'administrador.class.php';
include_once'cliente.class.php';

class Usuario {
    private $id;
    private $email;
    private $senha;
    private $nome;
    private $administrador;
    private $cliente;
    private $endereco;

    public function construct(){
        $administrador = new Adminstrador();
        $cliente = new Cliente();
    }

    public function setEmail($email){
        $this->email = $email;
    }

    public function getNome(){
        return $this->nome;
    }

    public function setNome($nome){
        $this->nome = $nome;
    }


        public function getEndereco(){
            return $this->endereco;
        }

        public function setEndereco($endereco){
            $this->endereco = $endereco;
        }

    public function getEmail(){
        return $this->email;
    }

    public function setSenha($senha){
        $this->senha = $senha;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function setCliente($cliente){
        $this->cliente = $cliente;
    }

    public function getCliente(){
        return $this->cliente;
    }

    public function setAdministrador($administrador){
        $this->administrador = $administrador;
    }

    public function getAdministrador(){
        return $this->administrador;
    }

    public function setId($id){
        $this->id = $id;
    }

    public function getId(){
        return $this->id;
    }
}
?>
