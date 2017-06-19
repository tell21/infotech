<?php
include_once'factory/fabrica.class.php';
class CadastroDAO {
    private $lastId;

    public function getLastId(){
        return $this->lastId;
    }

    public function inserirCadastro($cadastro, $idAdministrador){
        $con = (new Fabrica())->abrirConexao();
        $sql = "INSERT INTO cadastro VALUES (NULL, :data, :administrador_id)";
        $stm = $con->prepare($sql);
        $data = $cadastro->getData();
        $stm->bindParam(":data", $data);
        $stm->bindParam(":administrador_id", $idAdministrador);
        $stm->execute();

        $this->lastId =  $con->lastInsertId();

        $con = null;

        return $this->lastId;
    }

}
?>
