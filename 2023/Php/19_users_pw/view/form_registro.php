<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro</title>

</head>

<body>
    <main class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5 m-5 bg-light shadow p-3 mb-5 rounded">
                <h2 class="text-center">Registro de Usuarios</h2>
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
                            <input class="nav-link text-white bg-primary rounded-pill" type="submit" value="Registro" name="registrar">
                        </div>
                        <div class="col-sm-3">
                            <a class="nav-link text-white bg-warning rounded-pill" href="">Cancelar</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <p>¿Ya tiene una cuenta de usuario? <a href="">
                                Inicio de sesión
                            </a></p>
                    </div>

                </form>
            </div>
        </div>
    </main>
</body>

</html>