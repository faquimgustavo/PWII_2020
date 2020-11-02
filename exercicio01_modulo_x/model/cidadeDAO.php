<?php

require_once "cidade.php";
require_once "estadoDAO.php";
require_once "../db/conexao.php";

class CidadeDAO{
  private $conexao;


  public function __construct(Conexao $conexao){
    $this->conexao = $conexao->conectar();
  }


  public function inserir(Cidade $cidade){
    $sql = 'insert into cidade (nome, idEstado) values (:nome, :idEstado)';
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(':idEstado', $cidade->__get('estado')->__get('id'));
    $stmt->bindValue(':nome', $cidade->__get('nome'));
    $stmt->execute();
  }

    public function pesquisarNome($nome){
      $sql = 'select * from cidade where nome = :nome';
      $stmt = $this->conexao->prepare($sql);
      $stmt->bindValue(':nome', $nome);
      $stmt->execute();

      $resultado = $stmt->fetch(PDO::FETCH_OBJ);
      
      $conexao = new Conexao();
      $estadoDAO = new EstadoDAO($conexao);
      $estado = $estadoDAO->pesquisarId($resultado->idEstado); //Necessário existir um pesquisa por ID?
      $cidade = new Cidade($resultado->nome,$estado);
      return $cidade;
      
    }

  public function pesquisarId($id){
    $sql = 'select * from cidade where id = :id';
    $stmt = $this->conexao->prepare($sql);
    $stmt->BindValue(":id", $id);

    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_OBJ);
    $conexao = new Conexao();
    $estadoDAO = new EstadoDAO($conexao);
    $estado = $estadoDAO->pesquisarId($resultado->idEstado);
    $cidade = new Cidade($resultado->nome, $estado);
    return $cidade;
  }

  public function listarTudo(){
    $sql ='select * from cidade';
    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();

    $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
    $cidades = array();

    $conexao = new Conexao();
    $estadoDAO = new EstadoDAO($conexao);

    foreach($resultado as $id => $objeto){
      $estado = $estadoDAO->pesquisarId($objeto->idEstado);
      $cidade = new Cidade($objeto->nome, $estado);
      $cidades[] = $cidade;
    }
    return $cidades;
  }

}



?>