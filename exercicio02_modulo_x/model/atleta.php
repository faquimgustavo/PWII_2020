<?php 

class Atleta{
  public $nome;
  public $idade;
  public $altura;
  public $peso;


  public function __construct($nome, $idade, $altura, $peso){
    $this->nome = $nome;
    $this->idade = $idade;
    $this->altura = $altura;
    $this->peso = $peso;
  }

  public function __get($atributo){
    return $this->$atributo;
  }

  public function __set($atributo, $valor){
    $this->$atributo = $valor;
  }
}


?>