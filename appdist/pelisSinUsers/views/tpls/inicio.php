<?php

$bd = new BaseMysql();
$consulta = new Consulta();
$validar = new ValidarPelicula();
/*
* aqui aginamos el rol de 3 (visitante) a cualquiera que no venga desde la pagina de login
*/ 

if(!isset($_SESSION['rol'])){
	$_SESSION['rol']=3;
}
var_dump($_SESSION['rol']);



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
				<?php 
				/* 
				* aqui discriminamos si el usuario logueado es un administrador mirando las variables de sesion
				* si es 1 (admin) le damos el permiso de agregar peliculas
				*/
				
				if ($_SESSION['rol'] == 1) {
					echo ("<a class='nav-link' href=" . url_inici . "agregarPelicula/ >Agregar Película</a>");
				} ?>
			</li>
			<li class="nav-item">
				<form action="./controllers/logout.php">
					<button type="submit">logout</button>
				</form>
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
				<td>
					<a href="<?= url_inici ?>detallePelicula/<?= $value['id']; ?>">
						<ion-icon name="eye"></ion-icon>
					</a>
				</td>
				<td>
					<?php

					/*
					* en esta entrada y la siguiente se discrimina otra vez el rol del usuario y se enseñan o no segun su rol
					*/
					
					if ($_SESSION['rol'] == 1 || $_SESSION['rol'] == 2) {
						echo ('<a href="' . url_inici . 'editarPelicula/' . $value['id'] . '">' .
							'<ion-icon name="create"></ion-icon>' .
							'</a>'
						);
					} ?>
				</td>
				<td>
					<?php if ($_SESSION['rol'] == 1) {
						echo ('<a href="' . url_inici . 'borrarPelicula/' . $value['id'] . '">' .
							'<ion-icon name="trash"></ion-icon>' .
							'</a>'
						);
					};
					?>
				</td>
			</tr>

		<?php endforeach; ?>
		<tr>

		</tr>
	</tbody>
</table>