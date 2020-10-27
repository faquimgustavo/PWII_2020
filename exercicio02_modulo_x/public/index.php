<!DOCTYPE html>
<html lang="pt-br">
  <header>
    <meta charset="utf-8">
    <title>Página Inicial</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
  </header>
  <body>
   
  <?php 
    ini_set('display_errors',1);
    ini_set('display_startup_erros',1);
    error_reporting(E_ALL);

    require_once "../model/atleta.php";
    require_once "../dao/atletaDAO.php";
    require_once "../bd/conexao.php";

    $conexao = new Conexao();
    $atletaDAO = new AtletaDAO($conexao);
  ?>

    <div class="container">

      <div class="row">
        <div class="col-12 col-md-12">
          <button class="btn btn-dark"><a href="form-cadastro.php">Cadastrar atleta</a></button>
        </div>
      </div>
      
      <div class="row">
        <div class="col-12 col-md-12">
          <button class="btn btn-dark"><a href="">Deletar atleta</a></button>
        </div>
      </div>

      <div class="row">
        <div class="col-12 col-md-12">
          <form class="form-inline my-lg-1" action="index.php" method="post">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" name="nome" aria-label="Pesquisar">
            <button class="btn btn-dark my-2 my-sm-0" type="submit">Pesquisar</button>
          </form>
        </div>
      </div>
    
    </div>

    <div class="container tabela">
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nome</th>
            <th scope="col">Idade</th>
            <th scope="col">Altura</th>
            <th scope="col">Peso</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <?php 
              $atletas = $atletaDAO->listarTudo();
              #print_r($atletas);
              $cont = 0;
              $x = 0;
              /*foreach($atletas as $atleta){
                foreach($atleta as $key => $valor){
                  
                  if($cont == 3 || $cont == 0){
                    echo "<td>";
                  }
                  echo $valor;
                  #echo "<b> X = ".$x." - CONT = ".$cont."</b>";

                  if($x == 3 || $x == 0){
                    echo "</td>";
                    $cont = 0;
                    $x == 0;
                  }
                  $x++;
                  $cont ++;
                }
                
                
              } */
             foreach($atletas as $atleta){
                $aux = array();
                echo "<td>";
                foreach($atleta as $key => $valor){
                  echo $valor;
                  
                }
                echo "</td>";
             }


             
            ?>
          </tr>
        </tbody>
      </table>
      
    </div>
  </body>
</html>