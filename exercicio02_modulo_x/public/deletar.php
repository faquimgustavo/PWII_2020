<?php

ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once "../model/atleta.php";
require_once "../dao/atletaDAO.php";
require_once "../bd/conexao.php";


$conexao = new Conexao();
$atletaDAO = new AtletaDAO($conexao);


$ids = $_POST['lista_apagar'];
print_r($ids);

foreach($ids as $id){
  $atleta = $atletaDAO->deletar($id);  
}

header('Location: index.php');




?>