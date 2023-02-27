<?php

/*
if(condición a evaluar como true){
instrucciones
}elseif(otra condición){
instrucciones
}else{
otras
}

// OPERADORES DE COMPARACIÓN
==  igual
=== identico
!=  diferente
<>  diferente
!== no identico
<   menor que
>   mayor que
<= menor o igual que
>= mayor o igual que

// OPERADORES LÓGICOS
&&  AND Y
||  OR  O
!   NOT NO
 */

// Ejemplo 1
$color = "verde";
if ("rojo" == $color) {
 echo "EL COLOR ES ROJO";
} else {
 echo "el color es $color";
}
echo "<br>";

// Ejemplo 2
$year = 2020;
if ($year >= 2021) {
 echo "De 2021 en adelante";
} else {
 echo "Anterior a 2021";
}

// Ejemplo 3
$nombre       = "Perico Perolillos";
$ciudad       = "Almería";
$continente   = "Europa";
$edad         = 9;
$mayoria_edad = 18;

if ($edad >= $mayoria_edad) {
 echo "<h1>$nombre es mayor de edad</h1>";
 if ("Madrid" == $ciudad) {
  echo "<h2>Vive en $ciudad</h2>";
 } else {
  echo "<h2> No vive en Madrid</h2>";
 }

} else {
 echo "<h2>$nombre NO es mayor de edad</h2>";

 if ("Madrid" == $ciudad) {
  echo "<h2>Vive en $ciudad</h2>";
 } else {
  echo "<h2> No vive en Madrid</h2>";
 }

}

echo "<hr>";

// Ejemplo 4
$dia = 2;

if (1 == $dia) {
 echo "LUNES";
} elseif (2 == $dia) {
 echo "MARTES";
} elseif (3 == $dia) {
 echo "MIERCOLES";
} elseif (4 == $dia) {
 echo "JUEVES";
} elseif (5 == $dia) {
 echo "VIERNES";
} else {
 echo "Es finde";
}
echo "<hr/>";

// SWITCH
$dia = 1;
switch ($dia) {
 case 1:
  echo "LUNES";
  break;
 case 2:
  echo "MARTES";
  break;
 case 3:
  echo "MIERCOLES";
  break;
 case 4:
  echo "JUEVES";
  break;
 case 5:
  echo "VIERNES";
  break;
 default:
  echo "ES FIN DE SEMANA";
}

echo "<hr/>";

// Ejemplo 5
//condicionales con varias opciones en la primera evaluación

$edad1        = 18;
$edad2        = 65;
$edad_oficial = 17;

if ($edad_oficial >= $edad1 && $edad_oficial <= $edad2) {
 echo "ESTA EN EDAD DE TRABAJAR";
} else {
 echo "NO PUEDE TRABAJAR";
}

echo "<hr>";
$pais = "Inglaterra";
//condicionales con varias opciones en la primera evaluación
if ("México" == $pais || "Colombia" == $pais || "Costa Rica" == $pais) {
 echo "Habla Español";
} else {
 echo " No se habla Español";
}

echo "<hr>";
//Operador condicional o ternario
$pais = "Vanuato";
echo $pais == "Mexico" || "Colombia" == $pais || "Costa Rica" == $pais ? " En $pais se habla Español" : "En $pais se habla Bislama";