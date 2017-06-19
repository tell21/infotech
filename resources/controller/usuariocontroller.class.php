<?php 
include_once'../dao/usuariodao.class.php';
include_once'../model/usuario.class.php';
class UsuarioController {

    public function getUsuario($email, $senha){
        return (new UsuarioDAO())->getPorEmailESenha($email, $senha);
    }

    public function inserirUsuario($nome, $email, $senha, $idAdministrador, $idCliente){
        $usuario = new Usuario();
        $usuario->setNome($nome);
        $usuario->setEmail($email);
        $usuario->setSenha($senha);
        return (new UsuarioDAO())->inserirUsuario($usuario, $idAdministrador, $idCliente);
    }

    public function existeEmail($email){
        return (new UsuarioDAO())->existeEmail($email);
    }

}
?>