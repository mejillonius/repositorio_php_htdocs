<?php
/*
while(condición){
bloque de instrucciones
otra instruccion
}
*/

$numero = 0;

while ($numero <= 10) {
    /* echo $numero . " , "; */
    echo $numero;
    if (10 != $numero) {
        echo ", ";
    }
    $numero++;
}

echo "<hr/>";

?>

<!-- recibimos valor por get -->
<form action="" method="get">
    <label for="numero">Introduce un número</label>
    <input type="number" name="numero" id="numero" />
    <input type="submit" value="Enviar" />
</form>
<?php
if (isset($_GET["numero"]) && is_numeric($_GET["numero"])) {
    $numero = $_GET["numero"];
} else {
    $numero = 1;
}
echo "<h2>Tabla de multiplicar del número $numero</h2>";
$cont = 0;
while ($cont <= 10) {
    echo "$numero x $cont = " . ($numero * $cont) . "<br/>";
    $cont++;
}

echo "<hr/>";

$edad = 17;
$contador = 1;
$result = "";



echo "<hr/>";
/*
do{
//instrucciones
}while(condicion);
*/



?>