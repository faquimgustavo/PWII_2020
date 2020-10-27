<?php 

require_once "../model/atleta.php";
require_once "../bd/conexao.php";

class AtletaDAO{
  private $conexao;

  public function __construct(Conexao $conexao){
    $this->conexao = $conexao->conectar();
  }

  public function inseir(Atleta $atleta){
    $sql = 'insert into atleta (nome,idade,altura,peso) values (:nome, :idade, :altura, :peso)';
    $stmt = $this->conexao->prepare($sql);
    $stmt->BindValue(":nome", $atleta->__get('nome'));
    $stmt->BindValue(":idade", $atleta->__get('idade'));
    $stmt->BindValue(":altura", $atleta->__get('altura'));
    $stmt->BindValue(":peso", $atleta->__get('peso'));
    $stmt->execute();
  }

  public function pesquisarNome($nome){
    $sql = "select * from atleta where nome like :nome";
    $stmt = $this->conexao->prepare($sql);
    $stmt->BindValue(':nome', "'%".$nome."%'");
    print_r($stmt);
    $stmt->execute();

    if($stmt->execute() == False){
      echo"<pre>";
        print_r($stmt->errorInfo());
      echo"</pre>";
    }

    $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
    print_r($resultado);
    $atletas = array();
    

    foreach($resultado as $id => $objeto){
      print_r($resultado->nome);
      $atleta = new Atleta($objeto->nome, $objeto->idade, $objeto->altura, $objeto->peso);
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
      $atleta = new Atleta($objeto->nome, $objeto->idade, $objeto->altura, $objeto->peso);
      $atletas[] = $atleta;
    }
    return $atletas;
  }

  public function deletar($id){
    $sql = "delete from atleta where id = :id";
    $stmt = $this->conexao->prepare($sql);
    $stmt->BindValue(':id', $id);
    $stmt->execute();
  }
}


?>