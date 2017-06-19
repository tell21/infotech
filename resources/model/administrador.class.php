<?php
include_once'cadastro.class.php';
class Administrador {
    private $id;
    private $usuario;
    private $cadastros;

    public function __construct(){
        $usuario = new Usuario();
        $cadastros = array();
    }

    public function construct(){

    }

    public function setId($id){
        $this->id = $id;
    }

    public function setCadastros($cadastros){
        $this->cadastros = $cadastros;
    }

    public function getCadastros(){
        return $this->cadastros;
    }

    public function addCadastro($cadastro){
        array_push($this->cadastros, $cadastro);
    }

    public function getUsuario(){
        return $this->usuario;
    }

    public function setUsuario($usuario){
        $this->usuario = $usuario;
    }

    public function setNome($nome){
        $this->usuario->setNome($nome);
    }
}
?>
