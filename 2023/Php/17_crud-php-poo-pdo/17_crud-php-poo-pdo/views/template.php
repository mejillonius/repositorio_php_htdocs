<!DOCTYPE html>
<html lang="es">

<head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <title>Peliculas</title>
      <meta name="description" content="">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
      <link rel="stylesheet" href="css/master.css">
      <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
</head>

<body>



      <!-- Header -->

      <div class="headear row">
            <div class="col-12 d-flex align-items-center">
                  <h3>CRUD de Películas</h3>
                  <a href="index.php">

                  </a>
            </div>
      </div>
<!--       <nav class="navbar navbar-expand navbar-dark bg-dark">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample02">
                  <ul class="navbar-nav mr-auto">
                        <li class="nav-item">
                              <a class="nav-link text-white d-flex d-flex align-items-center" href="agregarPelicula.php"><ion-icon name="add-circle" class="agregar"></ion-icon> Agregar Pelicula</a>
                        </li>
                  </ul>
            </div>
      </nav> -->

      <!--
	menu -->

      <nav class="container-fluid  bg-light">

            <div class="container">

                  <ul class="nav nav-justified py-2 nav-pills">

                        <?php if (isset($_GET["tpls"])) : ?>

                              <?php if ($_GET["tpls"] == "agregarPelicula") : ?>

                                    <li class="nav-item">
                                          <a class="nav-link active" href="agregarPelicula">Agregar Película</a>
                                    </li>

                              <?php else : ?>

                                    <li class="nav-item">
                                          <a class="nav-link" href="agregarPelicula">Agregar Película</a>
                                    </li>

                              <?php endif ?>


                              <?php if ($_GET["tpls"] == "inicio") : ?>

                                    <li class="nav-item">
                                          <a class="nav-link active" href="inicio">Inicio</a>
                                    </li>

                              <?php else : ?>

                                    <li class="nav-item">
                                          <a class="nav-link" href="inicio">Inicio</a>
                                    </li>

                              <?php endif ?>



                        <?php else : ?>



                              <li class="nav-item">
                                    <a class="nav-link active" href="agregarPelicula">Agregar Película</a>
                              </li>


                              <li class="nav-item">
                                    <a class="nav-link" href="inicio">Inicio</a>
                              </li>

                        <?php endif ?>

                  </ul>

            </div>

      </nav>

      <!-- CONTENIDO -->

      <main class="container-fluid">

            <div class="container py-5">

                  <?php

                  #ISSET: isset() Determina si una variable está definida y no es NULL

                  if (isset($_GET["tpls"])) {

                        if (
                              $_GET["tpls"] == "agregarPelicula" ||

                              $_GET["tpls"] == "inicio"

                        ) {

                              require_once "tpls/" . $_GET["tpls"] . ".php";
                        } else {

                              require_once "tpls/error404.php";
                        }
                  } else {

                        require_once "tpls/inicio.php";
                  }
                  ?>

            </div>

      </main>

      <!-- jQuery library -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

      <!-- Popper JS -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js"></script>

      <!-- Latest compiled JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

      <!-- Latest compiled Fontawesome-->
      <script src="https://kit.fontawesome.com/e632f1f723.js" crossorigin="anonymous"></script>

      <script src="https://www.google.com/recaptcha/api.js?render=_reCAPTCHA_site_key"></script>

</body>

</html>