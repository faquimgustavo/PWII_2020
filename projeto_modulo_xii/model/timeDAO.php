<?php

require_once "../model/time.php";
require_once "../model/atleta.php";
require_once "../bd/conexao.php";

class TimeDAO{
  private $conexao;


  public function __construct(Conexao $conexao){
    $this->conexao = $conexao->conectar();
  }

  public function salvar(Time $time){
    $sql = "insert into time (nome, cidade, qntVitoria, anoFundacao, idTreinador) values (:nome, :cidade, :qntVitoria, :anoFundacao, :idTreinador)";
    $stmt = $this->conexao->prepare($sql);
    $stmt->BindValue(":nome",$time->__get('nome'));
    $stmt->BindValue(":cidade",$time->__get('cidade'));
    $stmt->BindValue(":qntVitoria",$time->__get('qntVitoria'));
    $stmt->BindValue(":anoFundacao",$time->__get('anoFundacao'));
    $stmt->BindValue(":idTreinador",$time->__get('treinador')->__get('id'));

    if($stmt->execute() == False){
      echo"<pre>";
        print_r($stmt->errorInfo());
      echo"</pre>";
    }

    $time->__set("id",$this->conexao->lastInsertId());
    
    $this->addAtletas($time->atletas);
    
  }

  private function addAtletas($atleta){
    foreach($atleta as $id => $atletas){
      $sql = "insert into atletaTime (idTime, idAtleta) values (:idTime, :idAtleta)";
      $stmt = $this->conexao->prepare($sql);
      $idTime = $this->conexao->lastInsertId();
      echo "<h1>",$idTime,"</h1>";
      echo "<h2>",$atletas->__get('id'),"</h2>";
      $stmt->BindValue(':idTime', $idTime);
      $stmt->BindValue(':idAtleta', $atletas->__get('id'));
      #echo "<br><br>Nome: ", $$atleta->__get("id");
      $stmt->execute();
    }
    
    
  }

}


?>