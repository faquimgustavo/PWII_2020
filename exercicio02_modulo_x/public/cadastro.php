<?php 


ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once "../model/atleta.php";
require_once "../dao/atletaDAO.php";
require_once "../bd/conexao.php";

$conexao = new Conexao();
$atletaDAO = new AtletaDAO($conexao);


$atleta = new Atleta($_POST['nome'], $_POST['idade'], $_POST['altura'], $_POST['peso']);

#print_r($atleta);

$atletaDAO->inseir($atleta);

header('Location: index.php');

echo "<pre>";
print_r($atleta);
echo "</pre>";

?>