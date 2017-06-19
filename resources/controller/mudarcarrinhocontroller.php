<?php
session_start();
$qtd = $_GET['qtd'];
$id = $_GET['id'];

$produtos = json_decode($_SESSION['carrinho:produtos'], true);

foreach ($produtos as $key => $value) {
  if($value['id'] == $id){
    $produtos[$key]['qtd'] = $qtd;
  }
}

$_SESSION['carrinho:produtos'] = json_encode($produtos);

header("Location: ../view/carrinho.php");

?>
