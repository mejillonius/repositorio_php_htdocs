<!-- $sesion: almacena y mantiene datos(los que queramos) del usuario mientras navega en un sitio web hasta qeu cierra sesion, sale del dominio
 -->
 <?php
require('assets/functions.php');

echo $normal_var;

session_start(); //iniciar la sesion o mantener la ya iniciada;
pDump($_SESSION);
/* $_SESSION['session_var1'] = "yo soy una variable de sesion"; */
echo "<br>";
echo $_SESSION['session_var1'];
echo "<br>";
$numero = 1234567.890;
$_SESSION['session_var2'] = $numero;

pDump($_SESSION);

?>
<a href="intr_vars_sesion.php"> ir a intro </a> || <a href="mas_vars_sesion.php">ir a mas variables de sesion </a>
<?php
session_destroy();
?>