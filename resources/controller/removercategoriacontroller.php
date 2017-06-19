<?php
session_start();
include_once'../dao/categoriadao.class.php';

if(isset($_POST['id'])){
  (new CategoriaDAO())->remover($_POST['id']);
  $_SESSION['msg:addCategoria'] = "Categoria removida com sucesso";
  header("Location: categoriascontroller.php");
}
?>
