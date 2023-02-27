<?php
function pDump($variable)
{
      echo "<pre>";
      var_dump($variable);
      echo "</pre>";
}

$cantantes = ['Josele Santiago', 'Justin Sullivan', 'Chrissie Hynde', 'Yomismo'];
$numeros = [1, 2, 5, 8, 3, 4];
pDump($numeros);

// Ordenar

sort($numeros);
pDump($numeros);

pDump($cantantes);


$cantantes[] = "Natos";
pDump($cantantes);
array_push($cantantes, "Waor");
pDump($cantantes);
$cantantes[] = "otro";
pDump($cantantes);

//elimiar elementos array

array_pop($cantantes);
pDump($cantantes);

unset($cantantes[2]);
pDump($cantantes);

$indice = array_rand($cantantes);
echo $cantantes[$indice];

pDump(array_reverse($numeros));

$resultado = array_search('Natos', $cantantes);
pDump($resultado);

echo sizeof($cantantes);
echo "<br>";
echo count($cantantes);
echo "<br>";


//comprobar key
$animales = ["perro" => "bruce", "gato" => "schmeichel"];
if(array_key_exists("perro",$animales)){
      echo "tengo un perro llamado $animales[perro]";
}
;

echo "<br>";
$animales = ["perro", "gato", "oso"];

//codificiar como json
$prueba1 = json_encode($animales);

echo "<br><hr/>";
pDump($prueba1);
echo "<br><hr/>";
$prueba2 = json_decode($prueba1);
pDump($prueba2);
echo "<br><hr/>";

//crear arrays asociativos a partir de 2 arrays
$keys = ['cielo', 'tierra', 'mar'];
$values = ['azul', 'verde', 'turquesa'];
$nev_array = array_combine($keys, $values);
pDump($nev_array);
echo "<br>";

function alCubo($numero){
      return $numero * $numero * $numero;
}

$a = [1, 2, 3, 4, 5];
$result = array_map('alCubo', $a);
pDump($result);
echo "<br>";

$result2 = array_map(function ($n) {
      return ($n * $n * $n); }, $a);
pDump($result2);

echo "<br> result3";
$result3 = array_map(fn($n) =>
       $n * $n * $n, range($a[1],$a[3]));
pDump($result3);


$array = ['Apple', 'BANANA', 'Mango', 'orange', 'GRAMPES'];


$employeeNames = ['jhon', 'mark', 'lisa'];
$employeeEmails = ['jhon@example.com', 'mark@example.com', 'lisa@example.com', 'uuuuu@ooooo.com'];
$res = array_map(null, $employeeNames, $employeeEmails);
pDump($res);
$res2 = json_encode($res);
echo "<br> dump res";
pDump($res2);
echo $res2;


$agenda = [
      ['nombre' => 'Pepe', 'email' => 'email@email.com',],
      ['nombre' => 'Pepon', 'email' => 'otro@email.com',],
      ['nombre' => 'Jose', 'email' => 'masl@email.com',],
      'nombre' => 'Antonio',
];

echo "<br> agenda json";
$agenda_string = json_encode($agenda);
echo "<br>";
echo $agenda_string;
echo "<br>";
pDump($agenda_string);


