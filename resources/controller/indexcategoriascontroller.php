<?php
  include_once'../dao/produtodao.class.php';
  session_start();
  $id = $_GET['id'];

  if(isset($id)){
    $_SESSION['produtos'] = json_encode((new ProdutoDAO())->getProdutosPorCategoria($id));
    header("Location: indexcontroller.php");
  }
?>
