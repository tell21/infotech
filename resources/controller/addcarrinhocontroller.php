<?php
include_once'../dao/produtodao.class.php';
session_start();
$id = $_POST['id'];
$qtd = $_POST['qtd'];
if(isset($id)){
  $produtos = array();
  if(!empty($_SESSION['carrinho:produtos'])){
    $produtos = json_decode($_SESSION['carrinho:produtos'], true);
  }
  $produto = (new ProdutoDAO())->getProdutoPorId($id);
  $produto['qtd'] = $qtd;

  $flag = false;
  foreach ($produtos as $key => $value) {
    if(strcasecmp($value['nome'],$produto['nome']) == 0){
      $produtos[$key]['qtd'] = $qtd + $value['qtd'];
      $flag = true;
    }
  }

  if(!$flag){
    array_push($produtos, $produto);
  }

  $_SESSION['carrinho:produtos'] = json_encode($produtos);

  if(!empty($_GET['comprar'])){
    header("Location: ../view/carrinho.php");
  }

  header("Location: indexcontroller.php");
}
?>
