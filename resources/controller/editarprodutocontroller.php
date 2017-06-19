<?php
include_once'../dao/categoriadao.class.php';
include_once'../dao/produtodao.class.php';
include_once'../dao/imagemdao.class.php';
include_once'../util/uploadimagem.class.php';
include_once'../model/cadastro.class.php';
include_once'../model/estoque.class.php';
include_once'../model/produto.class.php';
session_start();


$id = $_POST['id'];
$nome = $_POST['nome'];
$estoque = $_POST['estoque'];
$descricao = $_POST['descricao'];
$categoriaId = $_POST['categoria'];
$preco = $_POST['preco'];

if((!isset($nome) || !isset($estoque) || !isset($descricao) || !isset($categoriaId) || !isset($preco)) && !isset($_POST['salvar'])){
  $_SESSION['categorias'] = json_encode((new CategoriaDAO())->getCategorias());
  $_SESSION['imagens'] = json_encode((new ImagemDAO())->getImagensPorProduto($id));
  $_SESSION['produto'] = json_encode((new ProdutoDAO())->getProdutoPorId($id));

  header("Location: ../view/administrador/produtos/editarproduto.php");
} else if((isset($nome) || isset($estoque) || isset($descricao) ||
isset($categoriaId) || isset($preco)) && isset($_POST['salvar'])){

  $nomesImagens = null;
  if(isset($_FILES['files'])){
    $nomesImagens = (new UploadImagem())->uploadImagem($_FILES['files']);
  }
  $est = new Estoque();
  $est->setQuantidade(intval($estoque));

  $cadastro = new Cadastro();
  $cadastro->setData(date("Y-m-d H:i:s"));

  $categoria = new Categoria();
  $categoria->setId($categoriaId);

  $produto = new Produto();
  $produto->setId($id);
  $produto->setNome($nome);
  $produto->setEstoque($est);
  $produto->setPreco(floatval($preco));
  $produto->setDescricao($descricao);
  $produto->setCadastro($cadastro);
  $produto->setCategoria($categoria);
  $produto->setImagens($nomesImagens);

  (new ProdutoDAO())->atualizar($produto);

  $_SESSION['msg:addProduto'] = "Produto editado com sucesso!";
  header("Location: produtoscontroller.php");
}
?>
