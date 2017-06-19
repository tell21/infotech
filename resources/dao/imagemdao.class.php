<?php
include_once'factory/fabrica.class.php';
class ImagemDAO {

    private $lastId;

    public function getLastId(){
        return $this->lastId;
    }

    public function inserirImagem($imagem, $idProduto){
        $con = (new Fabrica())->abrirConexao();
        $sql = "INSERT INTO imagem VALUES (NULL, :url, :produto_id)";
        $stm = $con->prepare($sql);
        $stm->bindParam(":url", $imagem);
        $stm->bindParam(":produto_id", $idProduto);
        $stm->execute();

        $this->lastId =  $con->lastInsertId();

        $con = null;

    }

    public function getImagensPorProduto($id){
          $con = (new Fabrica())->abrirConexao();
          $sql = "SELECT * FROM imagem WHERE imagem_produto_id=:produtoId";
          $stm = $con->prepare($sql);
          $stm->bindParam(":produtoId", $id);
          $stm->execute();
          $result = $stm->fetchAll();
          $con = null;

          if($result === false){
              return null;
          }

          return $result;
    }

    public function removerImagem($id){
        $con = (new Fabrica())->abrirConexao();
        $sql = "DELETE FROM imagem WHERE id=:id";
        $stm = $con->prepare($sql);
        $stm->bindParam(":id", $id);
        $stm->execute();
        $con = null;        
    }

}
?>
