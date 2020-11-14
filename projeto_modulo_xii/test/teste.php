<?php 


ini_set('display_errors',1);
ini_set('display_startup_erros',1);
error_reporting(E_ALL);

require_once "../bd/conexao.php";
require_once "../model/atleta.php";
require_once "../model/treinador.php";
require_once "../model/time.php";
require_once "../model/atletaDAO.php";
require_once "../model/timeDAO.php";
require_once "../model/treinadorDAO.php";

$conexao = new Conexao();
$atletaDAO = new AtletaDAO($conexao);

$atletas_salve[] = array();
$atleta = new Atleta ('Maria', 26);
$atleta->__set('altura', 1.90);
$atleta->__set('peso', 85);
$atleta->__set('salario', 1500);
$atleta_salve[] = $atleta;

$atleta = new Atleta ('João', 31);
$atleta->__set('altura', 1.75);
$atleta->__set('peso', 80);
$atleta->__set('salario', 1499);

$atleta_salve[] = $atleta;

#$atletaDAO->salvar($atleta_salve[0]); 
#$atletaDAO->salvar($atleta_salve[1]); 

echo "<h3>Pesquisar Atletas por ID</h3>";
$atleta = $atletaDAO->pesquisarId(1);
echo("Nome: ".$atleta->__get('nome'));
echo("<br> Idade: ".$atleta->__get('idade'));
echo("<br> Salario: ".$atleta->__get('salario'));
echo("<br> Peso: ".$atleta->__get('peso'));

echo "<h3>Pesquisar por Nome</h3>";
$atleta = $atletaDAO->pesquisarNome('Maria');
foreach($atleta as $id => $objeto){
  echo("<br><br> Nome: ".$objeto->__get('nome'));
  echo("<br> Idade: ".$objeto->__get('idade'));
  echo("<br> Salario: ".$objeto->__get('salario'));
  echo("<br> Peso: ".$objeto->__get('peso'));
}

echo "<h3>Lista de todos os atletas</h3>";
$atltetas = array();
$atleta = $atletaDAO->listarTudo();
foreach($atleta as $id => $objeto){
  echo("<br><br> Nome: ".$objeto->__get('nome'));
  echo("<br> Idade: ".$objeto->__get('idade'));
  echo("<br> Salario: ".$objeto->__get('salario'));
  echo("<br> Peso: ".$objeto->__get('peso'));
  $atletas[] = $objeto;
}


$treinadorDAO = new TreinadorDAO($conexao);

$treinador_salve = array();
$treinador = new Treinador("Luiza", 8000 );
$treinador->__set('qntVitoria',25);
$treinador->__set('bonusSalario',3000);
$treinador_salve[] = $treinador;

$treinador = new Treinador("Marcelo", 8000 );
$treinador->__set('qntVitoria',20);
$treinador->__set('bonusSalario',2500);
$treinador_salve[] = $treinador;


#$treinadorDAO->salvar($treinador_salve[0]);
#$treinadorDAO->salvar($treinador_salve[1]);

echo "<h3>Pesquisar Treinadores por ID</h3>";
$treinador = $treinadorDAO->pesquisarId(1);
echo "Nome: ", $treinador->__get('nome');
echo "<br> Salario: ", $treinador->__get('salario');
echo "<br> Vitoria: ", $treinador->__get('qntVitoria');
echo "<br> Bonus Salario: ", $treinador->__get("bonusSalario");
$treinador2 = $treinador;


echo "<h3>Pesquisar Treinadores por Nome</h3>";
$treinador = $treinadorDAO->pesquisarNome("Mar");

foreach($treinador as $id => $objeto){
  echo("<br><br> Nome: ".$objeto->__get('nome'));
  echo("<br> Salario: ".$objeto->__get('salario'));
  echo("<br> Vitoria: ".$objeto->__get('qntVitoria'));
  echo("<br> Salario: ".$objeto->__get('bonusSalario'));
  
}


echo "<h3>Lista de todos os treinadores</h3>";
$treinador = $treinadorDAO->listarTudo();
foreach($treinador as $id => $objeto){
  echo("<br><br> Nome: ".$objeto->__get('nome'));
  echo("<br> Salario: ".$objeto->__get('salario'));
  echo("<br> Vitoria: ".$objeto->__get('qntVitoria'));
  echo("<br> Salario: ".$objeto->__get('bonusSalario'));
  
}


$timeDAO = new TimeDAO($conexao);

$time = new Time("Time 25", "Ceres", $treinador2, $atletas);
$time->__set("qntVitoria",4);
$time->__set("anoFundacao",2015);


$timeDAO->salvar($time);



?>