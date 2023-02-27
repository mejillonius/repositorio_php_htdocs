<?php

?>


<!DOCTYPE html>
<html lang="es">

<head>
      <!-- Required meta tags always come first -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta http-equiv="x-ua-compatible" content="ie=edge">
      <link rel="stylesheet" href=" https://www.w3schools.com/w3css/4/w3.css">
      <title>¿Qué tiempo hace?</title>
      <style>
      html {


            /*     background: url("https: //picsum.photos/1000") no-repeat center center fixed; */
            background-size: cover;
      }

      .w3-container {
            text-align: center;
      }

      h1,
      label {
            color: white;
            font-weight: 800;
            text-shadow: 1px 1px black, -1px -1px black;

      }
      </style>
</head>

<body>
      <div class="w3-container w3-display-middle">
            <h1>¿Qué tiempo hace?</h1>
            <form class="w3-margin" action="">
                  <fieldset class="w3-padding w3-margin">
                        <label for="ciudad">Introduce el nombre de una ciudad:</label>
                        <input type="text" class="w3-padding" id="ciudad" name="ciudad"
                              placeholder="Por ej. Londres, Tokyo" value="">

                  </fieldset>

                  <button type="submit" class="w3-button w3-black">Enviar</button>
            </form>
            <div id="previsionTiempo">

            </div>
      </div>

</body>

</html>