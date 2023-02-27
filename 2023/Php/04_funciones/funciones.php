<?php
/*
functions
Una función es un conjunto de instrucciones agrupadas bajo un nombre concreto
y que pueden reutilizarse invocando a la función tantas veces como
queramos.
Existen funciones que reciben parámetros, otras que no, funciones anónimas y funciones flecha, funciones que ejecutan instrucciones, o que devuelven valores con return (Una función devuelve un solo valor, ya sea string, number,bolean, null,array, o object).
Crear function:
function nombreDeMiFuncion($parametro){
// instrucciones
}
Llamar function
nombreDeMiFuncion($mi_parametro);
nombreDeMiFuncion($mi_parametro);
*/

// Funciones que ejecutan acciones, con o sin parámetros
//Ejemplo 1
function muestraNombres()
{
    echo "Oscar Perolillos <br/>", "Pepe Perolillos <br/>", "Pepon Perolillos <br/>", "Pepin Perolillos<br/>";
    echo "<hr/>";
}

// llamar función

muestraNombres();

// Ejemplo 2 pasando variables globales
$numero = 9;
function tabla($numero)
{

    echo "<h3> Tabla de multiplicar del número: $numero </h3>";

    for ($i = 0; $i <= 10; $i++) {
        $operacion = $numero * $i;
        echo "$numero x $i = $operacion <br/>";
    }
}

// llamar función
tabla($numero);

//Funciones que devuelven un resultado reutilizable
// Ejemplo 3, return permita usar la variable local generada en la función, como variable global

$negrita;

function calculadora($numero1, $numero2, $negrita = true)
{

    // Conjunto de instrucciones a ejecutar
    $suma = $numero1 + $numero2;
    $resta = $numero1 - $numero2;
    $multi = $numero1 * $numero2;
    $division = $numero1 / $numero2;

    $cadena_texto = "";

    if ($negrita) {
        $cadena_texto .= "<strong>";
    }

    $cadena_texto .= "Suma de $numero1 y $numero2 =$suma <br/>";
    $cadena_texto .= "Resta de $numero1 y $numero2 = $resta <br/>";
    $cadena_texto .= "Multiplicación de $numero1 y $numero2 = $multi <br/>";
    $cadena_texto .= "División de $numero1 y $numero2 = $division <br/>";

    if ($negrita) {
        $cadena_texto .= "</strong>";
    }

    $cadena_texto .= "<hr/>";

    return print($cadena_texto);
}
$numero1 = 10;
$numero2 = 20;
calculadora($numero1, $numero2, $negrita = true);

// Ejemplo 4. Funciones que utilizan otras gracias a return, son llamadas desde dentro de otras

function getNombre($nombre)
{
    $texto = "El nombre es:  $nombre";
    return $texto;
}

function getApellidos($apellidos)
{
    $texto = "Los apellidos son: $apellidos";
    return $texto;
}

function setNombreApellidos($nombre, $apellidos)
{
    $texto = getNombre($nombre) . "<br/>" . getApellidos($apellidos) . "<br/>";
    /* return print($texto); */
    echo $texto;
    /*   return $texto; */
}

setNombreApellidos("Pepe", "Perolillos");
echo getNombre("Paco");
echo "<br/>";

//Functions anónimas
// Podemos  la sintaxis de las funciones  en  variables, el valor de la variable es el resultado de la función. para ejecutar la variable, se ha de llamar como si fueran una función.
$saludo = function () {
    return "Hola que tal";
};
echo $saludo();
echo "<br/>";
$nom = "Pepe";
$cognoms = "Pepez";

$saludodos = function () {

};
echo "<br/><hr>";
echo $saludodos();
echo "<br/><hr>";
$cognoms = "Peponez";


/*funciones flecha o arrow functions */
$saludar = fn() => "hola que tal: $nom $cognoms <br/>";
echo $saludar;

