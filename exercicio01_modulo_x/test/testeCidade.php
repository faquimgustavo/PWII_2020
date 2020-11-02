<?php 

require_once "../model/cidade.php";
require_once "../model/cidadeDAO.php";
require_once "../model/estado.php";
require_once "../model/estadoDAO.php";
require_once "../db/conexao.php";


$conexao = new Conexao();
$estadoDAO = new EstadoDAO($conexao);
$cidadeDAO = new CidadeDAO($conexao);


#$estado = $estadoDAO->buscarSigla('GO');
#$cidade = new Cidade("Ceres", $estado);

$cidade = $cidadeDAO->pesquisarId(2);
echo "<pre>";
print_r($cidade);
echo "</pre>";

echo "<br><br>";

$cidades = $cidadeDAO->listarTudo();
echo "<pre>";
print_r($cidades);
echo "</pre>";

#$cidadeDAO->inserir($cidade);



?>