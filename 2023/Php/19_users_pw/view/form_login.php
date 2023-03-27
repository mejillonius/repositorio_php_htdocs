<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <?php include 'bootstrap.php'; ?>
</head>

<body>
    <main class="container-fluid">
        <div class="row d-flex justify-content-center">
            <div class="col-md-5 m-5 bg-light shadow p-3 mb-5 rounded">
                <h2 class="text-center">Inicio de Sesión</h2>
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
                            <input class="nav-link text-white bg-primary rounded-pill" type="submit" value="Iniciar Sesión" name="ini-sesion">
                        </div>
                        <div class="col-sm-3">
                            <a class="nav-link text-white bg-warning rounded-pill" href="">Cancelar</a>
                        </div>
                    </div>
                    <div class="text-center">
                        <p>¿No tiene cuenta de usuario? Vaya al <a href="">Registro de usuarios</a></p>

                    </div>
                </form>
            </div>
        </div>
    </main>
</body>


</html>