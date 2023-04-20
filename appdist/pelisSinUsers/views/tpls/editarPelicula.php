<?php
$bd = new BaseMysql();
$consulta = new Consulta();

/*
* failsafe para evitar que usuarios no autorizados editen peliculas
*/
if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) {
    header('Refresh:5;url=' .'//' . $_SERVER['SERVER_NAME'] . '/appdist/usersSinPelis/');
}
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $pelicula = new Pelicula($_POST['title'], $_POST['rating'], $_POST['awards'], $_POST['release_date'], $_POST['length'], $_POST['genre_id'], $_POST['img']);

    $validar = new ValidarPelicula();

    $validar->controllerImg($pelicula);

    $errores = $validar->validadorPelicula($pelicula);

    if (count($errores) == 0) {
        $consulta->actualizarPelicula($bd, 'movies', $pelicula, $_GET['id']);
    }
}

$genres = $consulta->listarGeneros($bd, 'genres');
$movie = $consulta->detallePelicula($bd, 'movies', 'genres', $_GET['id']);

?>

<div class="spacer"></div>
<h2 class="text-center">Editar Película</h2>
<div class="row mt-5">
    <div class="col-lg-8 offset-lg-2">
        <form action="" method="post" enctype="multipart/form-data">
            <img class="card-img-top" name="editar_img" src="<?= $movie['img']; ?>" alt="<?= $movie['title']; ?>">
            <div class="form-group">
                <label for="nombrePelicula">Nombre</label>
                <input type="text" class="form-control" name="title" id="nombrePelicula" value="<?= $movie['title']; ?>">
            </div>
            <div class="form-group">
                <label for="ratingPelicula">Rating</label>
                <input type="number" class="form-control" name="rating" id="ratingPelicula" value="<?= $movie['rating']; ?>">
            </div>
            <div class="form-group">
                <label for="awards">Awards</label>
                <input type="number" class="form-control" name="awards" id="awards" value="<?= $movie['awards']; ?>">
            </div>
            <div class="form-group">
                <label for="release-date">Release Date</label>
                <input type="date" class="form-control" name="release_date" id="release-date" value="<?= date('Y-m-d', strtotime($movie['release_date'])); ?>">

            </div>
            <div class="form-group">
                <label for="duracionPelicula">Duración</label>
                <input type="number" class="form-control" name="length" id="duracionPelicula" value="<?= $movie['length']; ?>">
            </div>
            <div class=" form-group">
                <label for="generos">Género de la Película</label>
                <select class="form-control" name="genre_id" id="generos">
                    <option value="<?= $movie['genre_id']; ?>"><?= $movie['name']; ?></option>
                    <?php foreach ($genres as $genre) : ?>
                        <?php if ($genre['id'] != $movie['genre_id']) : ?>
                            <option value="<?= $genre['id']; ?>"><?= $genre['name']; ?></option>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="file">Imagen</label>
                <input type="file" class="form-control" name="img" accept="image/*" id="imgPelicula">
                <input type="hidden" name="editar_img" value="<?= url_base ?>images/<?= $movie['img']; ?>">
            </div>





            <a href="<?= $_SERVER["HTTP_REFERER"]; ?>" class="btn btn-danger">Volver</a>
            <button type="submit" class="btn btn-primary">Actualizar Película</button>
        </form>

    </div>
</div>