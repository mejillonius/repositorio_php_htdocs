<!-- $sesion: almacena y mantiene datos(los que queramos) del usuario mientras navega en un sitio web hasta qeu cierra sesion, sale del dominio
 -->
<?php
require('assets/functions.php');

echo $normal_var;

session_start(); //iniciar la sesion o mantener la ya iniciada;
pDump($_SESSION);
$_SESSION['session_var1'] = "yo soy una variable de sesion";
echo "<br>";
echo $_SESSION['session_var1'];
echo "<br>";
$_SESSION['session_var2'];

pDump($_SESSION);

?>
<a href="uso_var_sesion.php"> ir a uso de variables de sesion </a> || <a href="mas_vars_sesion.php">ir a mas variables de sesion </a>