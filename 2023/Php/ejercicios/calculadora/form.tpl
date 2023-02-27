<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">

      <h1>Calculadora</h1>
<form method="POST" action="calculadora.php">

    <div class="form-group row">
      <label for="value1" class="col-sm-2 col-form-label">Valor 1:</label>
      <div class="col-sm-10">
<input type="text"  name="value1" id="value1" value=""/> <br/>
      </div>
    </div>
    <div class="form-group row">
      <label for="value2" class="col-sm-2 col-form-label"> Valor 2:</label>
      <div class="col-sm-10">
<input type="text" name="value2" id="value2" value="" /> <br/><br/> 

      </div>
    </div>
    <fieldset class="form-group row">
      <legend class="col-form-legend col-sm-2">Radios</legend>
      <div class="col-sm-10">

        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="action" id="gridRadios1" value="suma">Sumar
          </label>
        </div>

        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="action" id="gridRadios2" value="resta">Restar
          </label>
        </div>
        <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="action" id="gridRadios3" value="multi">Multiplicar
          </label>
        </div>
         <div class="form-check">
          <label class="form-check-label">
            <input class="form-check-input" type="radio" name="action" id="gridRadios4" value="dividir">Dividir

          </label>
         </div>

      </div>
    </fieldset>

    <div class="form-group row">
      <div class="offset-sm-2 col-sm-10">

      <input type="submit" name="calcular" value="Calcular" />
      </div>
    </div>
  </form>
</div>

  </body>
</html>