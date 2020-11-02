<?php 

require_once "cliente.php";
require_once "estadoDAO.php";
require_once "cidadeDAO.php";
require_once "../db/conexao.php";

class ClienteDAO{
  private $conexao;


public function __construct(Conexao $conexao){
  $this->conexao = $conexao->conectar();
}

public function inserir(Cliente $cliente){
    $sql = 'insert into cliente (nome, idade, idCidade) values (:nome, :idade, :idCidade)';
    $stmt = $this->conexao->prepare($sql);
    $stmt->BindValue(':nome', $cliente->__get('nome'));
    $stmt->BindValue(':idade', $cliente->__get('idade'));
    #print_r($cliente->__get('cidade'));
    $stmt->BindValue(':idCidade', $cliente->__get('cidade')->__get('estado')->__get('id'));
    $stmt->execute();
  }

public function pesquisarNome($nome){
    $sql = 'select * from cliente where nome = :nome';
    $stmt = $this->conexao->prepare($sql);
    $stmt->BindValue(':nome', $nome);
    $stmt->execute();

    $resultado = $stmt->fetch(PDO::FETCH_OBJ);

    $conexao = new Conexao();
    $cidadeDAO = new CidadeDAO($conexao);
    $cidade = $cidadeDAO->pesquisarId($resultado->idCidade);
    $cliente = new Cliente($resultado->nome, $resultado->idade, $cidade);
    return $cliente;
  }

  public function listarTudo(){
    $sql = 'select * from cliente';
    $stmt = $this->conexao->prepare($sql);
    $stmt->execute();

    $resultado = $stmt->fetchAll(PDO::FETCH_OBJ);
    $clientes = array();

    $conexao = new Conexao();
    $cidadeDAO = new CidadeDAO($conexao);

    foreach($resultado as $id => $objeto){
      $cidade = $cidadeDAO->pesquisarId($objeto->idCidade);
      $cliente = new Cliente($objeto->nome, $objeto->idade, $cidade);
      $clientes[] = $cliente;
    }
    return $clientes;
  }
}

?>