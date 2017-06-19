<?php
include_once'factory/fabrica.class.php';
include_once'../model/categoria.class.php';
include_once'cadastrodao.class.php';
class CategoriaDAO {
    private $lastId;

    public function construct(){

    }

    public function getLastId(){
        return $this->lastId;
    }

    public function inserirCategoria($categoria, $idCadastro){
        $cadastro = $categoria->getCadastro();
        $idCadastro = (new CadastroDAO())->inserirCadastro($cadastro,$idCadastro);

        $con = (new Fabrica())->abrirConexao();
        $sql = "INSERT INTO categoria VALUES (NULL, :nome, :cadastro_id)";
        $stm = $con->prepare($sql);
        $nome = $categoria->getNome();
        $stm->bindParam(":nome", $nome);
        $stm->bindParam(":cadastro_id", $idCadastro);
        $stm->execute();

        $this->lastId =  $con->lastInsertId();

        $con = null;

    }

    public function getCategorias(){
        $con = (new Fabrica())->abrirConexao();
        $sql = "SELECT * FROM categoria";
        $stm = $con->prepare($sql);
        $stm->execute();
        $result = $stm->fetchAll();
        $con = null;

        if($result === false){
            return null;
        }

        return $result;
    }

    public function remover($id){
        $con = (new Fabrica())->abrirConexao();
        $sql = "DELETE FROM categoria WHERE id=:id";
        $stm = $con->prepare($sql);
        $stm->bindParam(":id", $id);
        $stm->execute();
        $con = null;
    }

    public function atualizar($categoria){
        $sql =
        "UPDATE categoria SET nome='".$categoria->getNome()."'
        WHERE id=".$categoria->getId();

        $con = (new Fabrica())->abrirConexao();

        $con->query($sql);

        $con = null;
    }

}
?>
