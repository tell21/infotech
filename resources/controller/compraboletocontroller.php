<?php
require'../../autoloader.php';

use OpenBoleto\Banco\BancoDoBrasil;
use OpenBoleto\Agente;

session_start();

if(isset($_SESSION['usuario:administrador'])) {
    $usuario = json_decode($_SESSION['usuario:administrador'], true);
}
else if (isset($_SESSION['usuario:cliente'])) {
    $usuario = json_decode($_SESSION['usuario:cliente'], true);
}

$sacado = new Agente($usuario['nome'], '000.000.000-00', $usuario['endereco']['logradouro'],
$usuario['endereco']['cep'], $usuario['endereco']['cidade'], $usuario['endereco']['uf']);
$cedente = new Agente('Empresa de cosméticos LTDA', '02.123.123/0001-11', 'CLS 403 Lj 23', '71000-000', 'Brasília', 'DF');

$boleto = new BancoDoBrasil(array(
  // Parâmetros obrigatórios
  'dataVencimento' => new DateTime('2013-01-24'),
  'valor' => 23.00,
  'sequencial' => 1234567, // Para gerar o nosso número
  'sacado' => $sacado,
  'cedente' => $cedente,
  'agencia' => 1724, // Até 4 dígitos
  'carteira' => 18,
  'conta' => 10403005, // Até 8 dígitos
  'convenio' => 1234, // 4, 6 ou 7 dígitos
));

$_SESSION['boleto'] = $boleto->getOutput();

unset($_SESSION['carrinho:produtos']);

header("Location: indexcontroller.php")
?>
