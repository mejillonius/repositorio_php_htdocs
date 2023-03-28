<?php

$bd = new BaseMysql();

if ($_SERVER["REQUEST_METHOD"] === "POST"){
    $registro = new CtrUser(null, $_POST['username'],$_POST['password'],$_POST['role_id'],$_POST['email']);

    $validarUser = new ValidarUser();

    $errores = $validarUser->validadorRegistro($registro);

    if(count($errores)==0){
        $user = new MdlUser();
        $user->registro($bd, 'usuarios', $registro);
    }
}
?>

<h2 class="text-center">Registro de Usuarios</h2>
<?php if (isset($errores)) : ?>
            <ul class="alert alert-danger">
                <?php foreach ($errores as  $error) : ?>
                    <li><?= $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
<form action="" method="post">
      <div class="row form-group p-2">
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
                  <select name="role_id" style="width:100%">
                        <option value="" selected="selected">- Seleccione un Rol -</option>
                        <option value="2">Trabajador</option>
                        <option value="3">Externo</option>
                  </select>
            </div>
      </div>
      <div class="row d-flex justify-content-center p-3">
            <div class="col-sm-3 col-form-label">
                  <input class="nav-link text-white bg-primary rounded-pill" type="submit" value="Registro"
                        name="registrar">
            </div>
            <div class="col-sm-3">
                  <a class="nav-link text-white bg-warning rounded-pill" href="">Cancelar</a>
            </div>
      </div>
      <div class="text-center">
            <p>¿Ya tiene una cuenta de usuario? <a href="<?= url_base ?>login/">
                        Inicio de sesión
                  </a></p>
      </div>

</form>