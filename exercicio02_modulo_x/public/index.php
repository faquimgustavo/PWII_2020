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
          <form class="form-inline my-lg-1" action="index.php" method="post">
            <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" name="nome" aria-label="Pesquisar">
            <button class="btn btn-dark my-2 my-sm-0" type="submit">Pesquisar</button>
          </form>
        </div>
      </div>

      <div class="row">
          <div class="col-12 col-md-12">
            <form action="index.php" method='post'>
              <input type="submit" class="btn btn-dark" value='Cadastrar novo atleta' name='cadastrar'>
            </form>
          </div>
      </div>

    </div>

            <?php 

            if(isset($_POST['nome'])){
              $nome = $_POST['nome'];
              $atletas = $atletaDAO->pesquisarNome($_POST['nome']);

              echo "<div class='container tabela'>";
              echo " <table class='table table-striped table-dark' >";
              echo "<thead>";
              echo "<th scope='col'>Nome</th> <th scope='col'>Idade</th> <th scope='col'>Altura</th> <th scope='col'>Peso</th> <th scope='col'>Apagar</th> </tr> </thead> <tbody> <tr>";
              echo "";
              echo "";
              echo "";
              
              foreach($atletas as $atleta){
                echo "<tr><td>".$atleta->__get("nome");
                echo "<td>".$atleta->__get("idade");
                echo "<td>".$atleta->__get("altura");
                echo "<td>".$atleta->__get("peso");
                echo "<form action='deletar.php' method='post'>";
                #echo "<td>".$atleta->__get('id');
                echo "<td> <input type='checkbox' name='lista_apagar[]' value='".$atleta->__get('id')."'>";
                
                
             }
            }
            else if(isset($_POST['cadastrar'])){
              echo"<div class='container'>

              <form class='' action='cadastro.php' method='post'>
                <div class='row'>
        
                  <div class='form-group col-12 col-md-7'>
                    <label for='nome'>Nome</label>
                    <input type='text' class='form-control' id='nome' name='nome' placeholder='Nome'>
                  </div>
        
                  <div class='form-group col-12 col-md-1'>
                    <label for='idade'>Idade</label>
                    <input type='number' class='form-control' id='idade' name='idade' placeholder='18'>
                  </div>
        
                  <div class='form-group col-12 col-md-2'>
                    <label for='peso'>Peso</label>
                    <input type='number' step='0.010' class='form-control' id='peso' name='peso' placeholder='18'>
                  </div>
        
                  <div class='form-group col-12 col-md-2'>
                    <label for='altura'>Altura</label>
                    <input type='number' step='0.010' class='form-control' id='altura' name='altura' placeholder='1.80'>
                  </div>
        
                  
                  <input type='submit' class='btn btn-dark' value='Salvar'>
                  
                  
                </div>
              </form>
        
            </div>";
            }
            
            
             
            ?>
          </tr>
        </tbody>
      </table>
      
      <div class="container">
            <?php
              echo "<input type='submit' value='Deletar atleta(s)' nome='deletar' class='btn btn-dark'>";
              echo "</form>";
            ?>
            
          </div>
        </div>
      </div>



  </body>
</html>