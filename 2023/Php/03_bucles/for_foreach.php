<?php

function pDump($variable)
{
    $start = microtime(true);
    echo "<pre>";
    var_dump($variable);
    echo "</pre>";
    $end = microtime(true);
    $time = $end - $start;
    echo "execute time {$time}";
}

/* Bucle for
for(variable contador, condición, actualizando contador){
// instrucciones
}
 */

$resultado = 0;
for ($i = 0; $i <= 10; $i++) {
/*  $resultado += $i; */
    $resultado = $resultado + $i;
    print("$resultado<br/>");
}
pDump($resultado);
echo "<h1>El resultado final es: $resultado</h1>";