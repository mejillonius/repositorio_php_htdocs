<?php


?>
<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>CRUD</title>
  <link rel="stylesheet" type="text/css" href="hoja.css">


</head>

<body>

  <?php



  ?>
  <h1>CRUD<span class="subtitulo">Create Read Update Delete</span></h1>

  <table width="50%">
    <tr>
      <td class="primera_fila">Id</td>
      <td class="primera_fila">Nombre</td>
      <td class="primera_fila">Apellido</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
      <td class="sin">&nbsp;</td>
    </tr>
    <?php
    foreach ($registros as $dato) {
    }
    ?>

    <form method="POST" action="">
      <td></td>
      <td><input type='text' name='nom' size='10' class='centrado'></td>
      <td><input type='text' name='ape' size='10' class='centrado'></td>
      <td class='bot'><input type='submit' name='cr' id='cr' value='Insertar'></td>
      </tr>
  </table>
  </form>

  <?php


  ?>

</body>

</html>