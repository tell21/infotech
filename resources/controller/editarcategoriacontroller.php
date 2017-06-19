<?php
include_once'../dao/categoriadao.class.php';
include_once'../model/categoria.class.php';

session_start();

if(isset($_POST['id']) && isset($_POST['nome'])){
  $categoria = new Categoria();
  $categoria->setId($_POST['id']);
  $categoria->setNome($_POST['nome']);
  (new CategoriaDAO())->atualizar($categoria);

  $_SESSION['msg:addCategoria'] = "Categoria editada com sucesso!";

  header("Location: categoriascontroller.php");
}

?>
