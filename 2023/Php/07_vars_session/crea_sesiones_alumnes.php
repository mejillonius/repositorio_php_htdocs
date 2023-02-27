<?php
session_start();

?>

<!doctype html>
<html lang="es">

<head>
      <title>Envio por form de variables de sesión</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS v5.0.2 -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

</head>

<body>
      <form class="container col-md-8 col-lg-4" action="envio_v_sesion.php" method="get">
            <div class="mb-3">
                  <label for="nombre" class="form-label">Nombre:</label>
                  <input type="text" name="nombre" id="nombre" class="form-control" placeholder="Introduce tu nombre" value="<?= isset($_SESSION['nombre']) ? $_SESSION['nombre'] : ""; ?>">

            </div>
            <div class="mb-3">
                  <label for="mail" class="form-label">Correo electrónico:</label>
                  <input type="email" class="form-control" name="mail" id="mail" placeholder="nombre@dominio.com" value="<?= isset($_SESSION['mail']) ? $_SESSION['mail'] : ""; ?>">
            </div>
            <button type="reset" class="btn btn-danger">Reset</button>
            <input type="submit" value="Enviar" name="enviar">
            <!--             <button type="submit" class="btn btn-success" name="enviar">Enviar</button>
 -->
      </form>
</body>

</html>