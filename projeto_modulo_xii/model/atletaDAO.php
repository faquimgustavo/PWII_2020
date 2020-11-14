<?php 

require_once "atleta.php";

class AtletaDAO{
  private $conexao;


  public function __construct(Conexao $conexao){
    $this->conexao = $conexao->conectar();
  }


  public function salvar(Atleta $atleta){
    $sql = "insert into atleta (nome, salario, idade, peso) values (:nome, :salario, :idade, :peso)";
    $stmt = $this->conexao->prepare($sql);
    $stmt->BindValue(':nome', $atleta->__get('nome'));
    $stmt->BindValue(':salario', $atleta->__get('salario'));
    $stmt->BindValue(':idade', $atleta->__get('idade'));
    $stmt->BindValue(':peso', $atleta->__get('peso'));
    $stmt->execute();
  }

  public function pesquisarId($id){
    $sql = "select * from atleta where id = :id";
    $stmt = $this->conexao->prepare($sql);
    $stmt->BindValue(':id', $id);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_OBJ);

    
    $atleta = new Atleta($resultado->nome, $resultado->idade);
    $atleta->__set('salario', $resultado->salario);
    $atleta->__set('peso', $resultado->peso);
    
    return $atleta;
  }

  public function pesquisarNome($nome){
    $sql = "select * from atleta where nome like :nome";
    $stmt = $this->conexao->prepare($sql);
    $stmt->BindValue(':nome', '%'.$nome.'%');
    $stmt->execute();

    $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
    $atletas = array();

    foreach($resultado as $id => $objeto){
      $atleta = new Atleta($objeto->nome, $objeto->idade);
      $atleta->__set('id', $objeto->id);
      $atleta->__set('salario',$objeto->salario);
      $atleta->__set('peso',$objeto->peso);

      $atletas[] = $atleta;
    }
    return $atletas;
  }

  public function listarTudo(){
    $sql = "select * from atleta";
    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();

    $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
    $atletas = array();

    foreach($resultado as $id => $objeto){
      $atleta = new Atleta($objeto->nome, $objeto->idade);
      $atleta->__set('id', $objeto->id);
      $atleta->__set('salario',$objeto->salario);
      $atleta->__set('peso',$objeto->peso);
      $atletas[] = $atleta;
    }
    return $atletas;
  }


}





?>