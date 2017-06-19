<?php 
include_once'factory/fabrica.class.php';
include_once'usuariodao.class.php';
include_once'../model/cliente.class.php';
class ClienteDAO {
    private $lastId;

    public function getLastId(){
        return $this->lastId;
    } 

    public function inserirCliente($cliente){
        $con = (new Fabrica())->abrirConexao();
        $sql = "INSERT INTO cliente VALUES (null, :cpf, :rg)";
        $stm = $con->prepare($sql);
        $cpf = $cliente->getCpf();
        $stm->bindParam(":cpf", $cpf);
        $rg = $cliente->getRg();
        $stm->bindParam(":rg", $rg);
        $stm->execute();
        
        $this->lastId = $con->lastInsertId();
        
        $con = null;

        return $this->lastId;
    }

    public function getPorId($id){
        $con = (new Fabrica())->abrirConexao();
        $sql = "SELECT * FROM cliente WHERE id=:id";
        $stm = $con->prepare($sql);
        $stm->bindParam(":id", $id);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        $con = null;
        if($result === false){
            return null;
        }

        $cliente = new Cliente();
        $cliente->setId($result['id']);
        $cliente->setRg($result['rg']);
        $cliente->setCpf($result['cpf']);


        return $cliente;
    }
}
?>