<?php

// Debuggear
$nombre = "Òscar Perolillos";
var_dump($nombre);

// Fechas
echo date('d-m-Y');
echo "<br/>";
echo time(); //segundos desde 1-1-1970

// Matematicas
echo "<br/>";
echo "Raiz cuadrada de 10: " . sqrt(10);

echo "<br/>";
echo "Número aleatorio entre 10 y 40: " . rand(10, 40);

echo "<br/>";
echo "Número pi: " . pi();

echo "<br/>";
echo "Redondear: " . round(7.891234, 2); // y redondea arriba o abajo pero modifica el valor

$valor = 100.56789;
echo "<br/>";
echo "$valor, sin fijar decimales";
echo bcdiv($valor, '1', 1); //divide un valor entre 1 y devuelve los carácteres que se necesiten
echo "<br/>";
echo bcdiv($valor, '1', 2);
echo "<br/>";
echo bcdiv($valor, '1', 3);
echo "<br/>";
echo bcdiv($valor, '1', 4);

// Más funciones generales
echo "<br/>";
echo gettype($nombre);

// Detectar tipado
echo "<br/>";
if (is_string($nombre)) {
    echo "Esa variable es un string";
}

echo "<br/>";
if (!is_float($nombre)) {
    echo "La variable nombre no es un numero con decimales";
}
if (!is_numeric($nombre)) {
    echo "La variable nombre no es un numero";
}


// Comprobar si existe una variable
echo "<br/>";
if (isset($nombre)) {
    echo "La variable existe";
} else {
    echo "La variable no existe";
}

// Limpar espacios
echo "<br/>";
$frase = "    mi contenido    ";
var_dump(trim($frase));

// Eliminar variables / indices
$year = 2020;
var_dump($year);
unset($year);
var_dump($year);

// Comprobar variable vacia
$texto = "   ff    ";

if (empty(trim($texto))) {
    echo "La variable texto esta vacia";
} else {
    echo "La variable texto TIENE CONTENIDO";
}
echo "<br/>";

// Contar caracteres de un string
$cadena = "12345";
echo strlen($cadena);

echo "<br/>";

// Encontrar caracter
$frase = "La vida es bella";
echo strpos($frase, "i");
echo "<br/>";

// Reemplazar palabras de un string
$frase = str_replace("vida", "moto", $frase);
echo $frase;
echo "<br/>";

// MAYUSCULAS Y minusculas
echo strtolower($frase);
echo "<br/>";
echo strtoupper($frase);