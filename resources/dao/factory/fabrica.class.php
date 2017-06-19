<?php
class Fabrica{

    private $servidor = "localhost:3306";
    private $usuario = "root";
    private $senha = "root";
    private $banco = "_infotech_base";

    public function abrirConexao(){
        $conn = null;
        try {
            $conn = new PDO("mysql:host=$this->servidor;dbname=$this->banco", $this->usuario, $this->senha);
            // set the PDO error mode to exception
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $e){
            return null;
        } finally {
            return $conn;
        }
    }

    public function fecharConexao($link){
        mysql_close($link);
    }

}
?>