<?php
include_once'factory/fabrica.class.php';
include_once'../model/usuario.class.php';
include_once'clientedao.class.php';
include_once'administradordao.class.php';
class UsuarioDAO {
    private $lastId;

    public function getLastId(){
        return $this->lastId;
    }

    public function getPorEmailESenha($email, $senha){
        $con = (new Fabrica())->abrirConexao();
        $sql = "SELECT * FROM usuario JOIN endereco
            ON endereco.id=usuario.usuario_endereco_id WHERE usuario.email=:email AND usuario.senha=:senha";
        $stm = $con->prepare($sql);
        $stm->bindParam(":email", $email);
        $stm->bindParam(":senha", $senha);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);

        if($result === false){
            $sql = "SELECT * FROM usuario WHERE email=:email AND senha=:senha";
            $stm = $con->prepare($sql);
            $stm->bindParam(":email", $email);
            $stm->bindParam(":senha", $senha);
            $stm->execute();
            $result = $stm->fetch(PDO::FETCH_ASSOC);
        }

        $con = null;

        if($result === false){
            return null;
        }

        $usuario = new Usuario();
        $usuario->setId($result['id']);
        $usuario->setEmail($result['email']);
        $usuario->setSenha($result['senha']);
        $usuario->setNome($result['nome']);
        $endereco = [
            "id" => $result['usuario_endereco_id'],
            "logradouro" => $result['logradouro'],
            "cep" => $result['cep'],
            "cidade" => $result['cidade'],
            "uf" => $result['uf'],
        ];
        $usuario->setEndereco($endereco);

        $cliente = (new ClienteDAO())->getPorId($result['usuario_cliente_id']);
        if(isset($cliente)) $cliente->setUsuario($usuario);

        $administrador = (new AdministradorDAO())->getPorId($result['usuario_administrador_id']);
        if(isset($administrador)) $administrador->setUsuario($usuario);

        $usuario->setCliente($cliente);
        $usuario->setAdministrador($administrador);




        return $usuario;

    }

    public function inserirUsuario($usuario, $idAdministrador, $idCliente){

        $con = (new Fabrica())->abrirConexao();
        $sql = "INSERT INTO usuario VALUES (null, :email, :senha, :nome, :idAdministrador, :idCliente, null)";
        $stm = $con->prepare($sql);
        $email = $usuario->getEmail();
        $stm->bindParam(":email", $email);

        $senha = $usuario->getSenha();
        $stm->bindParam(":senha", $senha);

        $nome = $usuario->getNome();
        $stm->bindParam(":nome", $nome);

        $stm->bindParam(":idAdministrador", $idAdministrador);
        $stm->bindParam(":idCliente", $idCliente);
        $stm->execute();

        $this->lastId = $con->lastInsertId();

        $con = null;

        return $this->lastId;
    }

    public function existeEmail($email){
        $con = (new Fabrica())->abrirConexao();
        $sql = "SELECT email FROM usuario WHERE email=:email";
        $stm = $con->prepare($sql);
        $stm->bindParam(":email", $email);
        $stm->execute();
        $result = $stm->fetch(PDO::FETCH_ASSOC);
        $con = null;

        return $result;
    }
}
?>
