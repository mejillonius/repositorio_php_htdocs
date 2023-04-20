<?php
include 'loader.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $logueo = new CtrUser(null, $_POST['username'], $_POST['password'], null, $_POST['email']);

      $validarUser = new ValidarUser();

      $errores = $validarUser->validadorLogin($logueo);
      if (count($errores) == 0) {
            /*             $userLogueado = new MdlUser(); */
            MdlUser::loguear($bd, 'usuarios', $logueo);
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
            <h2 class="text-center">Inicio de Sesión</h2>
            <form action="" method="post" enctype="multipart/form-data">
                  <div class=" text-center">
                        <div class="row form-group p-2">
                              <?php if (isset($errores)) : ?>
                                    <ul class="alert alert-danger">
                                          <?php foreach ($errores as  $error) : ?>
                                                <li><?= $error; ?></li>
                                          <?php endforeach; ?>
                                    </ul>
                              <?php endif; ?>
                              <div class="col-sm-5 col-form-label">
                                    <label><i class="bi-person-fill"></i>Usuario</label>
                              </div>
                              <div class="col-sm-5">
                                    <input type="text" name="username" placeholder="Introduzca nombre usuario">
                              </div>
                        </div>
                        <div class="row form-group p-2">
                              <div class="col-sm-5 col-form-label">
                                    <label><i class="bi-envelope-open-fill"></i>Email</label>
                              </div>
                              <div class="col-sm-5">
                                    <input type="text" name="email" placeholder="Introduzca su email">
                              </div>
                        </div>
                        <div class="row form-group p-2">
                              <div class="col-sm-5 col-form-label">
                                    <label><i class="bi-lock-fill"></i>Password</label>
                              </div>
                              <div class="col-sm-5">
                                    <input type="password" name="password" placeholder="Introduzca su contraseña">
                              </div>
                        </div>
                  </div>
                  <div class="row d-flex justify-content-center p-3">
                        <div class="col-sm-3">
                              <input class="btn btn-warning" type="reset" value="Cancelar" name="cancelar">
                        </div>
                        <div class="col-sm-3">
                              <input class="btn btn-primary" type="submit" value="Iniciar Sesión" name="ini-sesion">
                        </div>

                  </div>
                  <div class="text-center">
                        <p>¿No tiene cuenta de usuario? Vaya al <a href="registro.php">Registro de usuarios</a></p>

                  </div>
            </form>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
      </main>

</body>

</html>