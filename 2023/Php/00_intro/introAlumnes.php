<?php

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    #roja {
        background-color: red;
        width: 300px;
        height: 300px
    }

    pre {
        display: grid;
        background-color: #eee;
        margin: 10px;
        padding: 10px;
        border: 1px solid black;

    }

    code {
        text-align: left;
    }
    </style>

</head>

<body>
    <h1 style='font-size:30px; font-family:Arial'>Ejemplo </h1>
    <p>Donde se prueba la generación de la páginas desde PHP. Para corregir el problema de los saltos de linea, podemos poner retornos al final de la línea<br>Hemos cambiado de línea.<br>Si queremos bajar a la línea siguiente,
        ---------- lo haremos con un &lt;br&gt; <br><strong><em>tag</em></strong> de tipo:
        <code>&lt;br/&gt;</code><code>&lt;br/&gt;</code>...<br /><br />Observa<br />como<br />se<br />hace. Y fíjate que podemos utilizar también texto en múltiples líneas en el código PHP, además de incluir tantos<strong><em>tags</em></strong> como deseemos.
    </p>

    <p>Me llamo </p>
    <p>Me llamo </p>
    <p>Me llamo </p>
    <p>Me llamo </p>
    <p></p>

    <?php



?>
    <pre>
	        <code>
	        	<?php


?>

	        </code>
	    </pre>



</body>

</html>