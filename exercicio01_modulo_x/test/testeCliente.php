<?php 

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once "../model/cidade.php";
require_once "../model/cliente.php";
require_once "../model/estado.php";
require_once "../model/cidadeDAO.php";
require_once "../model/estadoDAO.php";
require_once "../model/clienteDAO.php";
require_once "../db/conexao.php";


$conexao = new Conexao();
$cidadeDAO = new CidadeDAO($conexao);
$clienteDAO = new ClienteDAO($conexao);

$cidade = $cidadeDAO->pesquisarNome("Cuiabá");
$cliente = new Cliente('Ciclano', 32, $cidade);

#$clienteDAO->inserir($cliente);

echo "<pre>";
print_r($clienteDAO->listarTudo());
echo "</pre>";


?>
