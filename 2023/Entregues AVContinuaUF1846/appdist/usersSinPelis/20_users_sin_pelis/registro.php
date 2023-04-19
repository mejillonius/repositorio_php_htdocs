<?php
include 'loader.php';
$bd = new BaseMysql();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $registro = new CtrUser(null, $_POST['username'], $_POST['password'], $_POST['rol_id'], $_POST['email']);

      $validarUser = new ValidarUser();

      $errores = $validarUser->validadorRegistro($registro);
      if (count($errores) == 0) {
            /* $user = new MdlUser(); */
            MdlUser::registro($bd, 'usuarios', $registro);
      }
}

?>
<!DOCTYPE html>
<html lang="es">

<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Peliculas</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css">
      <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</head>

<body>

      <main class="container-fluid">
            <nav class="container bg-light">
                  <div class="container">
                        <ul class="nav nav-justified py-2 nav-pills">

                              <li class="nav-item">
                                    <a class="nav-link" href="index.php">login</a>
                              </li>

                              <li class="nav-item">
                                    <a class="nav-link" href="registro.php">registro</a>
                              </li>

                        </ul>

                  </div>

            </nav>

            <h2 class="text-center">Registro de Usuarios</h2>
            <form action="" method="post">
                  <div class="row form-group p-2">
                        <?php if (isset($errores)) : ?>
                              <ul class="alert alert-danger">
                                    <?php foreach ($errores as  $error) : ?>
                                          <li><?= $error; ?></li>
                                    <?php endforeach; ?>
                              </ul>
                        <?php endif; ?>
                        <div class="col-sm-5 col-form-label">
                              <label><i class="bi-person-fill"></i>Nombre de usuario</label>
                        </div>
                        <div class="col-sm-5">
                              <input type="text" name="username" placeholder="Introduzca nombre usuario">
                        </div>
                  </div>
                  <div class="row form-group p-2">
                        <div class="col-sm-5 col-form-label">
                              <label><i class="bi-envelope-open-fill"></i>Dirección Email</label>
                        </div>
                        <div class="col-sm-5">
                              <input type="text" name="email" placeholder="Introduzca su email">
                        </div>
                  </div>
                  <div class="row form-group p-2">
                        <div class="col-sm-5 col-form-label">
                              <label>Contraseña</label>
                        </div>
                        <div class="col-sm-5">
                              <input type="password" name="password" placeholder="Introduzca su contraseña">
                        </div>
                  </div>
                  <div class="row form-group p-2">
                        <div class="col-sm-5 col-form-label">
                              <label>Seleccione tipo de usuario</label>
                        </div>
                        <div class="col-sm-5">
                              <select name="rol_id" style="width:100%">
                                    <option value="" selected="selected">- Seleccione un Rol -</option>
                                    <option value="2">Trabajador</option>
                                    <option value="3">Externo</option>
                              </select>
                        </div>
                  </div>
                  <div class="row d-flex justify-content-center p-3">
                        <div class="col-sm-3">
                              <input class="btn btn-warning" type="reset" value="Cancelar" name="cancelar">
                        </div>
                        <div class="col-sm-3">
                              <input class="btn btn-primary" type="submit" value="Registro" name="registrar">
                        </div>
                  </div>
                  <div class="text-center">
                        <p>¿Ya tiene una cuenta de usuario? <a class="nav-link" href="index.php">Inicio de sesión </a></p>
                  </div>
            </form>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
      </main>

</body>

</html>