<?php
include_once'../dao/categoriadao.class.php';
include_once'../model/categoria.class.php';
include_once'../model/cadastro.class.php';
session_start();
$usuario = json_decode($_SESSION['usuario:administrador'], true);

if(isset($_POST['nome'])){
  $categoria = new Categoria();
  $categoria->setNome($_POST['nome']);
  $cadastro = new Cadastro();
  $cadastro->setData(date("Y-m-d H:i:s"));
  $categoria->setCadastro($cadastro);
  (new CategoriaDAO())->inserirCategoria($categoria,$usuario['id']);

  $_SESSION['msg:addCategoria'] = "Categoria adicionada com sucesso!";
  header("Location: categoriascontroller.php");
}

?>
