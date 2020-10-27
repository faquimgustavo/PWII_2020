<?php 

class Conexao{
  private $host = 'localhost';
  private $db = 'exercicio02_moduloX';
  private $usuario = 'root';
  private $senha = '123456789';

  public function conectar(){
    try{
      $conexao = new PDO(
        "mysql:host=$this->host;dbname=$this->db",
        "$this->usuario", "$this->senha"
      );
      return $conexao;
    } catch (PDOException $e){
      echo $e->getMessage();
    }
  }
}

?>