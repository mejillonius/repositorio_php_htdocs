<?php


?>

<!doctype html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <title>editar</title>
  <link rel="stylesheet" type="text/css" href="hoja.css">
</head>

<body>

  <h1>ACTUALIZAR</h1>

  <p>

    <?php


    ?>

  </p>
  <p>&nbsp;</p>
  <form name="form1" method="post" action="">
    <table width="25%">
      <tr>
        <td></td>
        <td><label for="id"></label>
          <input type="hidden" name="id" id="id" value="<?= $_REQUEST['id']; ?>">
        </td>
      </tr>
      <tr>
        <td>Nombre</td>
        <td><label for="nom"></label>
          <input type="text" name="nom" id="nom" value="">
        </td>
      </tr>
      <tr>
        <td>Apellido</td>
        <td><label for="ape"></label>
          <input type="text" name="ape" id="ape" value="">
        </td>
      </tr>
      <tr>
        <td collpan="2"><input type="submit" name="bot_actualizar" id="bot_actualizar" value="Actualizar"></td>
      </tr>
    </table>
  </form>
</body>

</html>