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
    
    $this->addAtletas($time);
    
    return $time;
  }

  private function addAtletas(Time $time){
    foreach($time->__get('atletas') as $id => $atletas){
      $sql = "insert into atletaTime (idTime, idAtleta) values (:idTime, :idAtleta)";
      $stmt = $this->conexao->prepare($sql);
      $idTime = $this->conexao->lastInsertId();
      $stmt->BindValue(':idTime', $time->__get('id'));
      $stmt->BindValue(':idAtleta', $atletas->__get('id'));
      $stmt->execute();
    }
  }

  public function pesquisarId($id){
    $sql = "select * from time where id = :id";
    $stmt = $this->conexao->prepare($sql);
    $stmt->BindValue(':id', $id);
    $stmt->execute();

  
    $resultado = $stmt->fetch(PDO::FETCH_OBJ);
    
    $sql2 = "select * from atletaTime where idTime = :idTime";
    $stmt2 = $this->conexao->prepare($sql2);
    $stmt2->BindValue(':idTime', $id);
    $stmt2->execute();

    $resultado2 = $stmt2->fetchAll(PDO::FETCH_OBJ);
    $atletas = [];
    $conexao = new Conexao();
    $atletaDAO = new AtletaDAO($conexao);
    

    foreach($resultado2 as $id => $objeto){
      #print_r($objeto);
      $atletas[] = $atletaDAO->pesquisarId($objeto->idAtleta);
      
    }

    $treinadorDAO = new TreinadorDAO($conexao);
    $treinador = $treinadorDAO->pesquisarId($resultado->idTreinador);

    $time = new Time($resultado->nome, $resultado->cidade, $treinador, $atletas);
    $time->__set('qntVitoria', $resultado->qntVitoria);
    $time->__set('anoFundacao', $resultado->anoFundacao);
    $time->__set('id', $id);

    return $time;

  }

  public function pesquisarNome($nome){
    $sql = "select * from time where nome like :nome";
    $stmt = $this->conexao->prepare($sql);
    $stmt->BindValue(':nome', '%'.$nome.'%');
    $stmt->execute();

    $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
    $times = array();

  
    $conexao = new Conexao();
    $atletaDAO = new AtletaDAO($conexao);

    $treinadores = array();
    $treinadorDAO = new TreinadorDAO($conexao);

    foreach($resultado as $id => $objetos){
      $atletas = [];
  

      $treinador = $treinadorDAO->pesquisarId($objetos->idTreinador);


      $sql2 = "select * from atletaTime where idTime = :idTime";
      $stmt2 = $this->conexao->prepare($sql2);
      $stmt2->BindValue(':idTime', $objetos->id);
      $stmt2->execute();

      $resultado2 = $stmt2->fetchAll(PDO::FETCH_OBJ);

      foreach($resultado2 as $id => $objeto){
        $atletas[] = $atletaDAO->pesquisarId($objeto->idAtleta);
      }

      $time = new Time($objetos->nome, $objetos->cidade, $treinador, $atletas);
      $time->__set('qntVitoria', $objetos->qntVitoria);
      $time->__set('anoFundacao', $objetos->anoFundacao);
      $time->__set('id', $objetos->id);
      $times[] = $time;
    }

    return $times;
  } 

  public function listarTudo(){
    $sql = "select * from time";
    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();

    $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
    $times = array();

  
    $conexao = new Conexao();
    $atletaDAO = new AtletaDAO($conexao);

    $treinadores = array();
    $treinadorDAO = new TreinadorDAO($conexao);

    foreach($resultado as $id => $objetos){
      $atletas = [];
  

      $treinador = $treinadorDAO->pesquisarId($objetos->idTreinador);


      $sql2 = "select * from atletaTime where idTime = :idTime";
      $stmt2 = $this->conexao->prepare($sql2);
      $stmt2->BindValue(':idTime', $objetos->id);
      $stmt2->execute();

      $resultado2 = $stmt2->fetchAll(PDO::FETCH_OBJ);

      foreach($resultado2 as $id => $objeto){
        $atletas[] = $atletaDAO->pesquisarId($objeto->idAtleta);
      }

      $time = new Time($objetos->nome, $objetos->cidade, $treinador, $atletas);
      $time->__set('qntVitoria', $objetos->qntVitoria);
      $time->__set('anoFundacao', $objetos->anoFundacao);
      $time->__set('id', $objetos->id);
      $times[] = $time;
    }

    return $times;

  }


}


?>