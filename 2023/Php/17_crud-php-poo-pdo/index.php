<?php
require_once 'loader.php';
require 'views/header.php';
require 'views/main.php';
require 'views/navbar.php';

if ($_GET && !empty(trim('busqueda'))) {
  $peliculas = $consulta->buscarPelicula($bd, 'movies', $_GET['busqueda']);
} else {
  $peliculas = $consulta->listarPeliculas($bd, 'movies');
}

?>

<div class="spacer"></div>
<h2 class="text-center">Listado de Películas!!!</h2>
<div>
  <!--Burcar peli-->
  <form action="" method="get">
    <input type="submit" value="Buscar"><input type="text" name="busqueda">
  </form>
</div>
<div class="spacer">
  <table class="table">
    <thead>
      <tr>
        <th>Id</th>
        <th>Nombre</th>
        <th>Ver</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($peliculas as $key => $value) : ?>
        <tr>
          <td><?= $value['id']; ?></td>
          <td><?= $value['title']; ?></td>
          <td><a href="detallePelicula.php?id=<?= $value['id']; ?>">
              <ion-icon name="eye"></ion-icon>
            </a></td>
          <td><a href="editarPelicula.php?id=<?= $value['id']; ?>">
              <ion-icon name="create"></ion-icon>
            </a></td>
          <td><a href="borrarPelicula.php?id=<?= $value['id']; ?>">
              <ion-icon name="trash"></ion-icon>
          </td></a>
        </tr>

      <?php endforeach; ?>
      <tr>

      </tr>
    </tbody>
  </table>
</div>


</body>

</html>