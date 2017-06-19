<?php 
    include_once'clientecontroller.class.php';
    include_once'usuariocontroller.class.php';

    session_start();
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $confirmarSenha = $_POST['confirmarSenha'];
    $nome = $_POST['nome'];
    $cpf = $_POST['cpf'];
    $rg = $_POST['rg'];

    if((new UsuarioController())->existeEmail($email)){
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $nome;
        $_SESSION['cpf'] = $cpf;
        $_SESSION['rg'] = $rg;
        $_SESSION['msg:registro'] = "Email ja existe!";
        $_SESSION['click:registro'] = true;
        header("Location: ../view/login.php");
    } else if($senha != $confirmarSenha){
        $_SESSION['email'] = $email;
        $_SESSION['nome'] = $nome;
        $_SESSION['cpf'] = $cpf;
        $_SESSION['rg'] = $rg;
        $_SESSION['msg:registro'] = "As senhas nao coincidem";
        $_SESSION['click:registro'] = true;
        header("Location: ../view/login.php");
    } else {
        $controller = new ClienteController();
        $idCliente = $controller->inserirCliente($cpf, $rg);
        $controller = new UsuarioController();
        $id = $controller->inserirUsuario($nome, $email, $senha, null , $idCliente);

        $array = [
            "id"    => $id,
            "nome"  => $nome,
            "email" => $email,
            "senha" => $senha,
        ];

        $_SESSION['usuario:cliente'] = json_encode($array);
        header("Location: ../../index.php");
    }


?>