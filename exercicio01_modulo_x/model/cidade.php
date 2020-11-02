<?php 


include_once "estado.php";

class Cidade{
  public $nome;
  public $estado;


  public function __construct($nome, Estado $estado){
    $this->nome = $nome;
    $this->estado = $estado;
  }

  public function __get($atributo) {
    return $this->$atributo;
  } 

  public function __set($atributo, $valor){
    $this->$atributo = $valor;
  }

} 


?>