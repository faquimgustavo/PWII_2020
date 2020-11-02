<?php 

require_once "estado.php";


class EstadoDAO{
  private $conexao;

  public function __construct(Conexao $conexao){
    $this->conexao = $conexao->conectar();
  }

  public function inserir(Estado $estado){
    $sql = 'insert into estado (nome, sigla) values (:nome, :sigla)';
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(':nome', $estado->__get('nome'));
    $stmt->bindValue(':sigla', $estado->__get('sigla'));
    $stmt->execute();
  }

  public function buscarNome($nome){
    $sql = 'select * from estado where nome = :nome';
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(':nome', $nome);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_OBJ);
    $estado = new Estado($resultado->nome, $resultado->sigla);
    $estado->__set('id',$resultado->id);
    return $estado;
  }

  public function buscarSigla($sigla){
    $sql = 'select * from estado where sigla = :sigla';
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(':sigla', $sigla);
    
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_OBJ);
    $estado = new Estado($resultado->nome, $resultado->sigla);
    $estado->__set('id',$resultado->id);
    return $estado;
  }


  public function pesquisarId($id){
    $sql = 'select * from estado where id = :id';
    $stmt = $this->conexao->prepare($sql);
    $stmt->bindValue(':id', $id);
    
    $stmt->execute();
    
    $resultado = $stmt->fetch(PDO::FETCH_OBJ);
    $estado = new Estado($resultado->nome, $resultado->sigla);
    $estado->__set('id', $resultado->id);
    return $estado;

  }

  public function listarTudo(){
    $sql = 'select * from estado';
    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();

    $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
    $estados = array();
    
    foreach($resultado as $id => $objeto){
      $estado = new Estado($objeto->nome, $objeto->sigla);
      $estado->__set('id', $objeto->id);
      $estados[] = $estado;
    }
    return $estados;
  }


}

?>