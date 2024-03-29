<?php
$bd = new BaseMysql();
$consulta = new Consulta();
$validar = new ValidarPelicula();
$pelicula = $consulta->detallePelicula($bd, 'movies', 'genres', $_GET['id']);

?>
<div class="spacer"></div>
<h2 class="text-center">Detalle de la Película!!!</h2>
<div class="row mt-5">
    <div class="col-lg-4 offset-lg-4">
        <div class="card w-100">
            <img class="card-img-top" src="<?= url_inici ?>images/<?= $pelicula['img']; ?>" alt="<?= $pelicula['title']; ?>">
            <div class=" card-body">
                <h5 class="card-title text-center"></h5>
                <p class="card-text">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quisquam nisi minima nemo expedita distinctio ipsa eum magnam fugiat! Aspernatur, illo.</p>
            </div>
            <ul class="list-group list-group-flush">
                <li class="list-group-item ">Título: <?= $pelicula['title']; ?> </li>
                <li class="list-group-item ">Calificación: <?= $pelicula['rating']; ?></li>
                <li class="list-group-item">Premios: <?= $pelicula['awards']; ?></li>
                <li class="list-group-item">Fecha de creación: <?= date('d-m-Y', strtotime($pelicula['release_date'])); ?></li>
                <li class="list-group-item">Duracion: <?= $pelicula['length']; ?></li>
                <li class="list-group-item">Genero: <?= $pelicula['name']; ?></li>
            </ul>

        </div>
        <!-- <a href="javascript:history.go(- 1);" class="btn btn-danger">Volver</a> -->
        <!--   header('Location:' . $_SERVER["HTTP_REFERER"]);-->
        <a href="<?= $_SERVER["HTTP_REFERER"] ?>" class="btn btn-danger">Volver</a>
    </div>
</div>