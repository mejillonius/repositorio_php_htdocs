<!DOCTYPE html>
	<html lang="es">
	<head>
		<meta charset="UTF-8">
		<title>{{#title#}}</title>
		<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
		<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@1,900&display=swap" rel="stylesheet"> 
		<style>
		h2{font-family: 'Roboto', sans-serif}
			.error{border:2px solid red!important;}
			img{
				height:20px;
			}
		</style>
	</head>
	<body>
		<div class="w3-container w3-card-4 w3-light-grey w3-padding-16 w3-half w3-display-middle">
			<nav>
				<a href="?lang=cat"><img src="../view/tpls/img/catalonia.svg" alt="Català">Català</a>
				<a href="?lang=cast"><img src="../view/tpls/img/spain.svg" alt="Castellano">Castellano</a>
			</nav>
			<section>
				<form method="post" action="../controller/app.php">
					<h2 class="w3-green w3-center">{{#title#}}</h2>
					{{#usuari#}}: <br><input type="text" class="w3-input w3-margin-top w3-border w3-round {{#class_error#}}" name="usuario" value="{{#usuario#}}"pattern="[A-Za-z0-9_.]{2,40}" title="{{#error_nom#}}"/><br><br>
					
					{{#mail#}}: <br><input type="text" class="w3-input w3-margin-top w3-border w3-round {{#class_error#}}" name="email" value="{{#email#}}" pattern="^[a-z0-9._%+-]+@[a-z]+\.[a-z]{2,}$" title="{{#error_mail#}}"/><br><br>
					
					<input type="hidden" name="action" value="NuevoUsuario">
					<div class="w3-center">
						<input class="w3-button w3-green w3-round-xlarge w3-margin-bottom " type="submit" name="registrar" value="{{#registra#}}" /><br>
					</div>
				</form>
			</section>
			{{#mensaje_error#}}	
		</div>
	</body>
	</html>