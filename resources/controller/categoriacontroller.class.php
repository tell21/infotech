<?php
include_once'../dao/categoriadao.class.php';
class CategoriaController {
  public function construct(){

  }

  public function getCategorias(){
    return (new CategoriaDAO())->getCategorias();
  }
}
?>
