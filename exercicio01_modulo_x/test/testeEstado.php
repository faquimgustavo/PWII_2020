<?php 

require_once "../model/estado.php";
require_once "../model/estadoDAO.php";
require_once "../db/conexao.php";

$conexao = new Conexao();
$estadoDAO = new EstadoDAO($conexao);

#$estado = new Estado('Goiás', 'GO');
#$estadoDAO->inserir($estado);
#$estado = $estadoDAO->buscarNome('Goiás');
#$estado = $estadoDAO->buscarSigla('GO');
#$estado = $estadoDAO->listarTudo();


$estado = $estadoDAO->pesquisarId(2);
echo "<pre>";
print_r($estado);
echo "</pre>"; 

?>