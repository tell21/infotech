<?php
  include_once'../dao/enderecodao.class.php';
  session_start();

  if(isset($_SESSION['usuario:administrador'])) {
      $usuario = json_decode($_SESSION['usuario:administrador'], true);
  }
  else if (isset($_SESSION['usuario:cliente'])) {
      $usuario = json_decode($_SESSION['usuario:cliente'], true);
  }

  $id = $_POST['idEndereco'];
  $logradouro = $_POST['logradouro'];
  $cep = $_POST['cep'];
  $cidade = $_POST['cidade'];
  $uf = $_POST['uf'];

  if($id == 0){
    $id = (new EnderecoDAO())->existe($logradouro, $cep, $cidade, $uf);
    if($id > 0){
      (new EnderecoDAO())->atualizar($logradouro, $cep, $cidade, $uf, $id);
    } else {
      $id = (new EnderecoDAO())->cadastrarEndereco($logradouro, $cep, $cidade, $uf);
    }
  } else {
    (new EnderecoDAO())->atualizar($logradouro, $cep, $cidade, $uf, $id);
  }

  $usuario['endereco']['id'] = $id;
  $usuario['endereco']['logradouro'] = $logradouro;
  $usuario['endereco']['cep'] = $cep;
  $usuario['endereco']['cidade'] = $cidade;
  $usuario['endereco']['uf'] = $uf;

  if(isset($_SESSION['usuario:administrador'])) {
      $_SESSION['usuario:administrador'] = json_encode($usuario);
  }
  else if (isset($_SESSION['usuario:cliente'])) {
      $_SESSION['usuario:cliente'] = json_encode($usuario);
  }

  header("Location: ../view/carrinho.php");

?>
