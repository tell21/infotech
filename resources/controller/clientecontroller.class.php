<?php 
include_once'../dao/clientedao.class.php';
include_once'../model/cliente.class.php';
include_once'../model/usuario.class.php';
class ClienteController {

    public function construct(){

    }

    public function inserirCliente($cpf, $rg){
        $cliente = new Cliente();
        $cliente->setRg($rg);
        $cliente->setCpf($cpf);

        $id = (new ClienteDAO())->inserirCliente($cliente);

        return $id;
    }
}
?>