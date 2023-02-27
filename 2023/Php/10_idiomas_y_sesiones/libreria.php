<?php
session_start();
if (isset($_GET['lang'])) {
      if ("es" == $_GET['lang']) {
            $_SESSION['idioma'] = "es";
      } elseif ("cat" == $_GET['lang']) {
            $_SESSION['idioma'] = "cat";
      }
} elseif (!isset($_SESSION['idioma'])) {
      $_SESSION['idioma'] = "es";
}

require $_SESSION['idioma'] . ".php";

//functions de nuestra librerií para cargar en los documentos
function cabecera($lang)
{
?>
      <!DOCTYPE html>
      <html>

      <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title><?= $lang['title']; ?></title>

      </head>

      <body>
            <p><a href="?lang=es">es</a> || <a href="?lang=cat">ca</a></p>
      <?php
}

function menu($lang)
{
      ?>
            <a href="index.php"><?= $lang['m1']; ?></a> || <a href="producto.php"><?= $lang['m2']; ?></a>
      <?php
}
function main($lang)
{
      ?>
            <h1><?= $lang['titular']; ?></h1>
            <p><?= $lang['cont1']; ?></p>
            <p><?= $lang['cont2']; ?></p>
            <p><?= $lang['cont3']; ?></p>
      <?php
}

function footer($lang)
{
      ?>
            <footer>
                  <h2><?= $lang['foot']; ?></h2>
            </footer>
      <?php
}
function other_footer($lang)
{
      ?>
            <footer>
                  <h2><?= $lang['foot2']; ?></h2>
                  <h3><?= $lang['foot3']; ?></h3>
            </footer>
      <?php
}

      ?>