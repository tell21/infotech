<?php 
include_once'factory/fabrica.class.php';
include_once'usuariodao.class.php';
include_once'../model/administrador.class.php';
class AdministradorDAO {
    private $lastId;

    public function getLastId(){
        return $this->lastId;
    } 

    public function getPorId($id){
        $con = (new Fabrica())->abrirConexao();
        $sql = "SELECT * FROM administrador WHERE id=:id";
        $stm = $con->prepare($sql);
        $stm->bindParam(":id", $id);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        $administrador = new Administrador();
        $administrador->setId($result['id']);
        $con = null;
        if($result === false){
            return null;
        }

        return $administrador;
    }
}
?>