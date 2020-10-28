<!DOCTYPE html>
<html lang='pt-br'>
  <header>
    <meta charset='utf-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Adicionar aluno</title>
    <title>Cadastro</title>
    <link rel='stylesheet' href='style.css'>
    <link rel='stylesheet' href='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css' integrity='sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO' crossorigin='anonymous'>
    <script src='https://code.jquery.com/jquery-3.3.1.slim.min.js' integrity='sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo' crossorigin='anonymous'></script>
    <script src='https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js' integrity='sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49' crossorigin='anonymous'></script>
    <script src='https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js' integrity='sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy' crossorigin='anonymous'></script>
  </header>
  <body>

    <div class='container'>

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

          
          <input type='submit' class='btn btn-primary mb-2' value='Cadastrar'>
          
          
        </div>
      </form>

    </div>

      

  </boby>
</html>