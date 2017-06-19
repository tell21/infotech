<?php
include_once'../util/uploadimagem.class.php';
include_once'../dao/produtodao.class.php';
include_once'../model/cadastro.class.php';
include_once'../model/estoque.class.php';
include_once'../model/produto.class.php';

session_start();

$nome = $_POST['nome'];
$estoque = $_POST['estoque'];
$descricao = $_POST['descricao'];
$categoriaId = $_POST['categoria'];
$preco = $_POST['preco'];

if(!isset($nome) || !isset($estoque) || !isset($descricao) || !isset($categoriaId) || !isset($preco)){
  $_SESSION['msg:addProduto'] = "Todos os campos devem ser preenchidos!";
  header("Location: produtoscontroller.php");
}


if((new ProdutoDAO())->existeProduto($nome)){
  $_SESSION['msg:addProduto'] = "Produto ja existe!";
  header("Location: produtoscontroller.php");
}

if(!is_numeric($estoque) || !is_numeric($preco)){
  $_SESSION['msg:addProduto'] = "Estoque e preço devem ser numeros!";
  header("Location: produtoscontroller.php");
}


$nomesImagens = (new UploadImagem())->uploadImagem($_FILES['files']);

if(!isset($nomesImagens)){
  $_SESSION['msg:addProduto'] = "As imagens devem estar em jpg, jpeg, png ou gif!";
  header("Location: produtoscontroller.php");
}



$est = new Estoque();
$est->setQuantidade(intval($estoque));

$cadastro = new Cadastro();
$cadastro->setData(date("Y-m-d H:i:s"));

$categoria = new Categoria();
$categoria->setId($categoriaId);

$produto = new Produto();
$produto->setNome($nome);
$produto->setEstoque($est);
$produto->setPreco(floatval($preco));
$produto->setDescricao($descricao);
$produto->setCadastro($cadastro);
$produto->setCategoria($categoria);
$produto->setImagens($nomesImagens);

$usuario = json_decode($_SESSION['usuario:administrador'], true);
(new ProdutoDAO())->inserirProduto($produto, $usuario['id']);

$_SESSION['msg:addProduto'] = "Produto adicionado com sucesso!";
header("Location: produtoscontroller.php");

?>
