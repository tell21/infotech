<?php
include_once'../dao/produtodao.class.php';
session_start();
$_SESSION['msg:addProduto'] = "Produto nao removido com sucesso!";
$id = $_POST['idExcluir'];
if(isset($_POST['idExcluir'])){
  (new ProdutoDAO())->remover($id);
  $_SESSION['msg:addProduto'] = "Produto removido com sucesso!";
}

header("Location: produtoscontroller.php");
?>
