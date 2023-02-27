<?php
function pDump($variable)
{
      echo "<pre>";
      echo "<code>";
      var_dump($variable);
      echo "</code>";
      echo "</pre>";
}

/* home */
$lang_home = [
      "logo" => "CiberTotMultilingual",
      "cambiar_idioma" => "Llenguatge",
      "cambiar" => "Canviar",
      "opcion_1" => "Seleccionar",
      "opcion_2" => "Castellano",
      "opcion_3" => "Català",
      "descripcion" => "Hola, Aquest es el títol en Català",
      "m1" => "Home",
      "m2" => "Producte",
      "title" => "Gestor de idiomes de la Pàgina index",
      "titular" => "Títol pàgina index",
      "cont1" => "Contingut del home",
      "cont2" => "Contingut 2 del home",
      "cont3" => "Contingut 3 del home",
      "foot" => "Texte del footer de la pàgina index",
];

/* $lang_home_encod = json_encode($lang_home);
echo "$lang_home_encod<br/>";

$lang_home = json_decode($lang_home_encod, true);
pDump($lang_home); */

/* Producto */
$lang_producto = [
      "logo" => "CiberTotMultilingual",
      "cambiar_idioma" => "Llenguatge",
      "cambiar" => "Canviar",
      "opcion_1" => "Seleccionar",
      "opcion_2" => "Castellano",
      "opcion_3" => "Català",
      "descripcion" => "Hola, Aquest es el títol en Català",
      "m1" => "Home",
      "m2" => "Producte",
      "title" => "Gestor de idiomas de la Pàgina producte",
      "titular" => "Títol pàgina Producte",
      "cont1" => "Contingut de la pàgina producte",
      "cont2" => "Contingut 2 de la pàgina producte",
      "cont3" => "Contingut 3 de la pàgina producte",
      "foot2" => "Texte del footer2 de la pàgina producte",
      "foot3" => "Texte del footer3 de la pàgina producte",
];
