<?php
  include_once'../dao/categoriadao.class.php';
  session_start();
  $_SESSION['categorias'] = json_encode((new CategoriaDAO())->getCategorias());

  header("Location: ../view/administrador/categorias/categorias.php");
?>
