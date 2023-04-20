<?php

$bd = new BaseMysql();
$consulta = new Consulta();
$validar = new ValidarPelicula();




if ($_SERVER['REQUEST_METHOD'] == 'GET' && (isset($_GET['busqueda']))) {
	$peliculas = $consulta->buscarPelicula($bd, 'movies', $_GET['busqueda']);
} else {
	$peliculas = $consulta->listarPeliculas($bd, 'movies');
}
?>
<nav class="container bg-light">
	<div class="container">
		<ul class="nav nav-justified py-2 nav-pills">




			<li class="nav-item">
				<a class="nav-link" href="<?= url_inici ?>agregarPelicula/">Agregar Película</a>
			</li>


		</ul>

	</div>

</nav>
<h2 class="text-center">Listado de Películas!!!</h2>

<div>
	<!--Este es formulario para que el usuario busque la película quje desee-->
	<form action="" method="get">
		<input type="submit" value="Buscar"><input type="text" name="busqueda">
	</form>
</div>

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
				<td><a href="<?= url_inici ?>detallePelicula/<?= $value['id']; ?>">
						<ion-icon name="eye"></ion-icon>
					</a></td>
				<td><a href="<?= url_inici  ?>editarPelicula/<?= $value['id']; ?>">
						<ion-icon name="create"></ion-icon>
					</a></td>
				<td><a href="<?= url_inici ?>borrarPelicula/<?= $value['id']; ?>">
						<ion-icon name="trash"></ion-icon>
				</td></a>
			</tr>

		<?php endforeach; ?>
		<tr>

		</tr>
	</tbody>
</table>