<?php 


require_once "../model/treinador.php";
require_once "../bd/conexao.php";

class TreinadorDAO{
  private $conexao;

  public function __construct(Conexao $conexao){
    $this->conexao = $conexao->conectar();
  }

  public function salvar(Treinador $treinador){
    $sql = "insert into treinador (nome, salario, qntVitoria, bonusSalario) values (:nome, :salario, :qntVitoria, :bonusSalario)";
    $stmt = $this->conexao->prepare($sql);
    $stmt->BindValue(":nome",$treinador->__get('nome'));
    $stmt->BindValue(":salario",$treinador->__get('salario'));
    $stmt->BindValue(":qntVitoria",$treinador->__get('qntVitoria'));
    $stmt->BindValue(":bonusSalario",$treinador->__get('bonusSalario'));
    $stmt->execute();
    
    $trinador->__set('id', $this->conexao->lastInsertId());
    return $treinador;
  }

  public function pesquisarId($id){
    $sql = "select * from treinador where id = :id";
    $stmt = $this->conexao->prepare($sql);
    $stmt->BindValue(":id", $id);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_OBJ);


    $treinador = new Treinador($resultado->nome, $resultado->salario);
    $treinador->__set('qntVitoria',$resultado->qntVitoria);
    $treinador->__set('bonusSalario',$resultado->bonusSalario);
    $treinador->__set('id', $resultado->id);
    return $treinador;
    
  }

  public function pesquisarNome($nome){
    $sql = "select * from treinador where nome like :nome";
    $stmt = $this->conexao->prepare($sql);
    $stmt->BindValue(':nome', '%'.$nome.'%');
    $stmt->execute();

    $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
    $treinadores = array();

    foreach($resultado as $id => $objeto){
      $treinador = new Treinador($objeto->nome, $objeto->salario);
      $treinador->__set('id', $objeto->id);
      $treinador->__set('qntVitoria', $objeto->qntVitoria);
      $treinador->__set('bonusSalario', $objeto->bonusSalario);
      $treinador->__set('id', $objeto->id);

      $treinadores[] = $treinador;
    }

    return $treinadores;

  }

  public function listarTudo(){
  $sql = "select * from treinador";
  $stmt = $this->conexao->prepare($sql);
  $stmt->execute();

  $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
  $treinadores = array();

  foreach($resultado as $id => $objeto){
    $treinador = new Treinador($objeto->nome, $objeto->salario);
    $treinador->__set('qntVitoria', $objeto->qntVitoria);
    $treinador->__set('bonusSalario', $objeto->bonusSalario);
    $treinadores[] = $treinador;
  }
  return $treinadores;
  }
}

?>