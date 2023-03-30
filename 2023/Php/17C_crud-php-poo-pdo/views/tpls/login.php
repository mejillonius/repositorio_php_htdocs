<?php

$bd = new BaseMysql();

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $logueo = new CtrUser(null, $_POST['username'],$_POST['password'],null,$_POST['email']);

    $validarUser = new ValidarUser();

    $errores = $validarUser->validadorLogin($logueo);

    if(count($errores)==0){
        $userLogueado = new MdlUser();
        $userLogueado->loguear($bd, 'usuarios', $logueo);
    }
}

?>

<h2 class="text-center">Inicio de Sesión</h2>
      <?php if (isset($errores)) : ?>
            <ul class="alert alert-danger">
                  <?php foreach ($errores as  $error) : ?>
                        <li><?= $error; ?></li>
                  <?php endforeach; ?>
            </ul>
      <?php endif; ?>
<form action="" method="post" enctype="multipart/form-data">
      <div class=" text-center">
            <div class="row form-group p-2">
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
                  <a class="btn btn-warning" href="">Cancelar</a>
            </div>
            <div class="col-sm-3">
                  <input class="btn btn-primary" type="submit" value="Iniciar Sesión" name="ini-sesion">
            </div>

      </div>
      <div class="text-center">
            <p>¿No tiene cuenta de usuario? Vaya al <a href="<?= url_base ?>registro/">Registro de usuarios</a></p>

      </div>
</form>
</div>