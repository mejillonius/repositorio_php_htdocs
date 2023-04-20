<?php
$bd = new BaseMysql();
$consulta = new Consulta();

/*
* failsafe para evitar que usuarios no autorizados agreguen peliculas
*/
if ($_SESSION['rol'] == 1 ) {
    header('Refresh:5;url=' .'//' . $_SERVER['SERVER_NAME'] . '/appdist/usersSinPelis/');
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {


    $pelicula = new Pelicula($_POST['title'], $_POST['rating'],  $_POST['awards'], $_POST['release_date'], $_POST['length'], $_POST['genre_id'], $_POST['img']);

    $validar = new ValidarPelicula();
    $validar->controllerImg($pelicula);

    $errores = $validar->validadorPelicula($pelicula);
    if (count($errores) == 0) {
        $consulta->guardarPelicula($bd, 'movies', $pelicula);
    }
}
$generos = $consulta->listarGeneros($bd, 'genres');


?>

<div class="spacer"></div>

<h2 class="text-center">Agregar Película</h2>
<div class="row mt-5">
    <div class="col-lg-8 offset-lg-2">
        <?php if (isset($errores)) : ?>
            <ul class="alert alert-danger">
                <?php foreach ($errores as  $error) : ?>
                    <li><?= $error; ?></li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
        <form action="" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="nombrePelicula">Nombre</label>
                <input type="text" class="form-control" name="title" id="nombrePelicula">
            </div>
            <div class="form-group">
                <label for="ratingPelicula">Rating</label>
                <input type="number" class="form-control" name="rating" id="ratingPelicula">
            </div>
            <div class="form-group">
                <label for="awards">Awards</label>
                <input type="number" class="form-control" name="awards" id="awards">
            </div>
            <div class="form-group">
                <label for="release-date">Release Date</label>
                <input type="date" class="form-control" name="release_date" id="release-date">
            </div>
            <div class="form-group">
                <label for="duracionPelicula">Duración</label>
                <input type="number" class="form-control" name="length" id="duracionPelicula">
            </div>

            <div class="form-group">
                <label for="generos">Género de la Película</label>
                <select class="form-control" name="genre_id" id="generos">
                    <option value="#" disabled>Seleccione género...</option>
                    <?php foreach ($generos as $key => $value) : ?>
                        <option value="<?= $value['id']; ?>"><?= $value['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="file">Imagen</label>
                <input type="file" class="form-control" name="img" accept="image/*" id="img">
            </div>
            <a href="<?= $_SERVER["HTTP_REFERER"];  ?>" class="btn btn-danger">Volver</a>
            <!--   <a class="btn btn-primary" href="" >Registrar</a> -->
            <button type="submit" class="btn btn-primary">Registrar Película</button>
        </form>

    </div>
</div>