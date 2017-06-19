<?php
include_once'usuariocontroller.class.php';
include_once'../model/administrador.class.php';
include_once'../model/usuario.class.php';

    session_start();
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $controller = new UsuarioController();
    $usuario = $controller->getUsuario($email, $senha);

    if(!isset($usuario)){
        $_SESSION['msg:login'] = "Email ou senha incorretos!";
        $_SESSION['email'] = $email;
        header("Location: ../view/login.php");
    }

    $administrador = $usuario->getAdministrador();
    $cliente = $usuario->getCliente();

    if(isset($administrador)) {

        $array = [
            "id"    => $administrador->getUsuario()->getId(),
            "nome"  => $administrador->getUsuario()->getNome(),
            "email" => $administrador->getUsuario()->getEmail(),
            "senha" => $administrador->getUsuario()->getSenha(),
            "endereco" => $administrador->getUsuario()->getEndereco(),
        ];
        $_SESSION['usuario:administrador'] = json_encode($array);
        header("Location: ../view/administrador/index.php");
    } else if(isset($cliente)){
        $array = [
            "id"    => $cliente->getUsuario()->getId(),
            "nome"  => $cliente->getUsuario()->getNome(),
            "email" => $cliente->getUsuario()->getEmail(),
            "senha" => $cliente->getUsuario()->getSenha(),
            "endereco" => $cliente->getUsuario()->getEndereco(),
        ];
        $_SESSION['usuario:cliente'] = json_encode($array);
        header("Location: indexcontroller.php");
    } else {
        $_SESSION['msg:registro'] = "Email ou senha incorretos!";
        $_SESSION['email'] = $email;
        header("Location: ../view/login.php");
    }
?>
