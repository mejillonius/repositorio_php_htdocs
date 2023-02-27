<?php
include "validacionserver.php";
?>

<!Doctype html>
<html lang="es">

<head>
      <!-- Required meta tags always come first -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <title>Contacto MVC</title>

      <!-- Bootstrap CSS -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
      <div class="container">

            <h1>Contacta con nosotros</h1>

            <div id="error">
                  <?php

                  echo $error . $exito;
                  ?>
            </div>

            <form method="post" name="firstContact" action="">
                  <fieldset class="form-group">
                        <label for="email">Dirección de email</label>
                        <input type="text" class="form-control" id="email" name="email" value="<?php echo isset($email) ? $email : ""; ?>" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}">
                        <div class="valid-feedback">email OK</div>
                        <div class="invalid-feedback"> email no correcto</div>
                  </fieldset>
                  <fieldset class="form-group">
                        <label for="asunto">Asunto</label>
                        <input type="text" class="form-control" id="asunto" name="asunto" value="<?php echo isset($asunto) ? $asunto : ""; ?>" pattern="[A-Za-zÀ-ÿ-\u00f1\u00d1\s]{5,250}">
                        <div class="valid-feedback">Asunto OK</div>
                        <div class="invalid-feedback"> asunto no correcto</div>
                        <small id="mostra2" class="text-muted"></small>
                  </fieldset>
                  <fieldset class="form-group">
                        <label for="contenido">¿Qué te gustaría preguntarnos?</label>
                        <textarea class="form-control" id="contenido" name="contenido" rows="3"><?php echo isset($contenido) ? $contenido : ""; ?></textarea>

                        <div class="valid-feedback"> OK</div>
                        <div class="invalid-feedback"> No correcto</div>
                  </fieldset>
                  <button type="submit" name="enviar" id="enviar" class="btn btn-primary">Enviar</button>
            </form>



      </div>

      <!-- <script src="js/validadoreitor.js"></script> -->


</body>

</html>