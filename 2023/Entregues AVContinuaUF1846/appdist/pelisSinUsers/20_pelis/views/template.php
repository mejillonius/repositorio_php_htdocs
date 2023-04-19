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
    <div class="container-fluid py-4">
        <div class="justified ">
            <a href="<?= url_inici ?>">
                <h3>CRUD de Películas</h3>
            </a>
        </div>
    </div>

    <main class="container-fluid">

        <!-- CONTENIDO -->
        <div class="container py-5">

            <?php


            $rutas = [];
            if (isset($_GET["tpls"])) {
                $rutas = explode("/", $_GET["tpls"]);
                if (

                    $rutas[0] == "inicio" ||
                    $rutas[0] == "agregarPelicula" ||
                    $rutas[0] == "detallePelicula" ||
                    $rutas[0] == "editarPelicula" ||
                    $rutas[0] == "borrarPelicula" ||
                    $rutas[0] == "busqueda"
                ) {

                    include "tpls/" . $rutas[0] . ".php";
                } else {
                    include "tpls/error404.php";
                }
            } else {
                include "tpls/inicio.php";
            }
            ?>

        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
    </main>

</body>

</html>