<?php 


ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once "../model/atleta.php";
require_once "../dao/atletaDAO.php";
require_once "../bd/conexao.php";

$conexao = new Conexao();
$atletaDAO = new AtletaDAO($conexao);

#$atleta = new Atleta("José", 32, 1.95, 100);

#$atletaDAO->inseir($atleta);

$atleta = $atletaDAO->pesquisarNome("Ful");

echo "<pre>";
print_r($atleta);
echo "</pre>";

?>