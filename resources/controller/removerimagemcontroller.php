<?php
  include_once'../dao/imagemdao.class.php';
  include_once'../dao/produtodao.class.php';
  include_once'../dao/categoriadao.class.php';
  $id = $_POST['idImagem'];
  $idProduto = $_POST['idProduto'];
  session_start();

  if(isset($id)){
    (new ImagemDAO())->removerImagem($id);

    $_SESSION['categorias'] = json_encode((new CategoriaDAO())->getCategorias());
    $_SESSION['imagens'] = json_encode((new ImagemDAO())->getImagensPorProduto($idProduto));
    $_SESSION['produto'] = json_encode((new ProdutoDAO())->getProdutoPorId($idProduto));

    header("Location: ../view/administrador/produtos/editarproduto.php");
  }
?>
