<?php
include_once'factory/fabrica.class.php';
class EnderecoDAO {
  public function existe($logradouro, $cep, $cidade, $uf){
    $con = (new Fabrica())->abrirConexao();
    $sql = "SELECT * FROM endereco WHERE logradouro=:logradouro
      AND cep=:cep AND cidade=:cidade AND uf=:uf";
    $stm = $con->prepare($sql);
    $stm->bindParam(":logradouro", $logradouro);
    $stm->bindParam(":cep", $cep);
    $stm->bindParam(":cidade", $cidade);
    $stm->bindParam(":uf", $uf);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    $con = null;

    if($result == false){
      return 0;
    }

    return $result['id'];
  }

  public function atualizar($logradouro, $cep, $cidade, $uf, $id){
    $sql =
    "UPDATE endereco SET logradouro='".$logradouro."', cep='".$cep."',
    cidade='".$cidade."', uf='".$uf."' WHERE id=".$id;
    
    $con = (new Fabrica())->abrirConexao();

    $con->query($sql);

    $con = null;

  }

  public function cadastrarEndereco($logradouro, $cep, $cidade, $uf){
    $con = (new Fabrica())->abrirConexao();
    $sql = "INSERT INTO endereco VALUES (null,:logradouro,:cep,:cidade,uf)";
    $stm = $con->prepare($sql);
    $stm->bindParam(":logradouro", $logradouro);
    $stm->bindParam(":cep", $cep);
    $stm->bindParam(":cidade", $cidade);
    $stm->bindParam(":uf", $uf);
    $stm->execute();

    $id = $con->lastInsertId();
    $con = null;
    return $id;
  }
}
?>
