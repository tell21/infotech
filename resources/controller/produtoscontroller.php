<?php
    include_once'../dao/categoriadao.class.php';
    include_once'../dao/produtodao.class.php';
    session_start();
    $_SESSION['categorias'] = json_encode((new CategoriaDAO())->getCategorias());
    $_SESSION['produtos'] = json_encode((new ProdutoDAO())->getProdutos());

    header("Location: ../view/administrador/produtos/produtos.php");
?>
