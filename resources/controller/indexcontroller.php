<?php
include_once'../dao/categoriadao.class.php';
include_once'../dao/produtodao.class.php';
session_start();

$_SESSION['categorias'] = json_encode((new CategoriaDAO())->getCategorias());
if(!isset($_SESSION['produtos'])){
  $_SESSION['produtos'] = json_encode((new ProdutoDAO())->getProdutos());
}
if(empty($_SESSION['carrinho:produtos'])){
  $_SESSION['carrinho:produtos'] = null;
}


header("Location: ../view/inicial.php");

?>
