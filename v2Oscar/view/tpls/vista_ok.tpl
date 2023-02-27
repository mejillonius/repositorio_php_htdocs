<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>{{#title#}}</title>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<style>
			img{
				height:20px;
			}
		</style>
	</head>
	<body class="w3-display-topmiddle" >
		<div class="w3-container w3-card-4 w3-padding-16 w3-margin-bottom">
			<nav>
				<a href="?lang=cat&canvi=true"><img style="height:20px" src="../view/tpls/img/catalonia.svg" alt="Català">Català</a>
				<a href="?lang=cast&canvi=true"><img style="height:20px" src="../view/tpls/img/spain.svg" alt="Castellano">Castellano</a>
			</nav>
			<section>	
				<h3 class="w3-green w3-center">{{#title#}}</h3>	
				<p>{{#registre_1#}} {{#usuario#}}.</p>
				<p>{{#registre_2#}} {{#email#}} </p>
				<div class="w3-center">
						<a class="w3-button w3-green w3-round-xlarge" href="app.php">{{#tornar#}}</a>
				</div>
			</section>
		</div >

		<div class="w3-container w3-card-4 w3-padding-16  ">
			<div>
				<p class="w3-padding-16"> {{#tabla#}}</p>
				<table class="w3-table w3-striped w3-bordered">
					<tr class="w3-green w3-center"><td>ID</td><td>{{#usuari#}}</td><td>{{#mail#}}</td></tr>
				{{#div#}}
			</div>
			<div class="w3-center w3-margin-top">
						<a class="w3-button w3-green w3-round-xlarge" href="app.php">{{#tornar#}}</a>
				</div>
		</div>		
	</body>
	</html>