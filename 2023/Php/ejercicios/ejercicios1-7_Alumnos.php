<!doctype html>
<html lang="es">

<head>
      <title>Ejercicios Php básicos</title>
      <!-- Required meta tags -->
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <!-- Bootstrap CSS v5.0.2 -->
      <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
      <style>
            code {
                  display: grid;
                  border: 1px solid black;
                  padding: 10px;
                  margin: 0 10px;
                  background-color: #ccc;
                  color: blue;
            }
      </style>

</head>

<body>
      <div class="container-fluid p-5">
            <h1><strong>Ejercicios básicos de Php</strong></h1>
            <p class="pt-3 mx-3"><strong>Ejercicio 1.</strong> <br />Crear dos variables "país" y "continente" y mostrar
                  su valor por pantalla(imprimir)
                  mostrar el tipo de dato contienen con alguna función que nos permita obtenerlo.</p>
            <div>
                  <code>

                        <hr />
                        <?php
                        $pais = "España";
                        $continente = "Europa";
                        echo "<h2> dump de pais</h2>";
                        echo "<p>valor: " . $pais . "<br>Tipo: " . gettype($pais);
                        echo "<hr/>";
                        echo "<h2> dump de continente</h2>";
                        echo "<p>valor: " . $continente . "<br>Tipo: " . gettype($continente);                       
                        ?>
                  </code>
            </div>
            <p class="pt-4 mx-3"><strong>Ejercicio 2.</strong> <br />
                  Ejercicio 2. Escribir un script en PHP que nos muestre por pantalla todos los numeros pares que hay
                  del 1 al 50. (bucle...)</p>
            <div>
                  <code>

                        <hr />
                        <?php
                        for ($i = 0; $i <= 50; $i++) {
                              echo ($i%2 == 0) ?  "$i<br>" : "";
                        }
                        ?>
                  </code>
            </div>
            <p class="pt-4 mx-3"><strong>Ejercicio 3.</strong> <br />
                  Ejercicio 3. Escribir un programa que imprima por pantalla los cuadrados
                  (un número multiplicado por sí mismo) de los 10 primeros números naturales.
                  PD: Utilizar bucle while y el bulce for
            </p>
            <div>
                  <code>

                        <hr />
                        <?php
                        echo '<h2> version while</h2>';
                        $i = 1;
                        while ($i <= 10){
                              $cuadrado = $i * $i;
                              echo "<p>$i al cuadrado = $cuadrado</p>";
                              $i++;
                        }
                        echo '<h2> version for </h2>';

                        for ($i = 1; $i<=10; $i++){
                              echo '<p>'.$i.' al cuadrado = '.$i*$i.'</p>';                              
                        }
                        ?>
                  </code>
            </div>
            <p class="pt-4 mx-3"><strong>Ejercicio 4.</strong> <br />
                  Recoger dos numeros por url(Parametros GET) y hacer todas las operaciones basicas de una
                  calculadora(suma, resta, multiplicación y división) de esos dos números, mostrando los números
                  recibidos y el resultado de cada operación en una línea diferente. Si no recibimos ningún parámetro, o
                  contienen errores, usaremos una cabecera que permita no salir del formulario y volver a introducir los
                  datos.</p>
            <div id="ejercicio4">
                  <code>

                        <form action="ejercicios1-7_Alumnos.php#ejercicio4" method="get">
                              <label id="labelNum1" for="num1">numero1</label>
                              <input type="number" aria-describedby="labelNum1" name="num1" id="num1" value="<?= isset($_GET['num1']) ? $_GET['num1'] : ""; ?>">
                              <label id="labelNum2" for="num2">numero2</label>
                              <input type="number" aria-describedby="labelNum2" name="num2" id="num2" value="<?= isset($_GET['num2']) ? $_GET['num2'] : ""; ?>">
                              <button type="submit">enviar</button>
                        </form>
                        <?php
                              function validar ($num1,$num2){
                                    if (is_numeric($num1)&&is_numeric($num2)){
                                    return true;
                                    } else {
                                    return false;
                                    }
                              }
                              if(!isset($_GET['num1'])|| !isset($_GET['num2'])){
                                    echo "<h2>por favor introduce valores en las cajas de formulario </h2>";
                              } else {
                                    $num1 = $_GET['num1'];
                                    $num2 = $_GET['num2'];

                                    if (validar($num1,$num2)){
                                    echo "hago las operaciones";
                                    echo "<h2> resultados </h2>".
                                    "<br/>".
                                    "<p>Suma: ".$num1+$num2."</p>".
                                    "<br/>".
                                    "<p>Resta: ".$num1-$num2."</p>".
                                    "<br/>".
                                    "<p>Multiplicacion: ".$num1 * $num2."</p>".
                                    "<br/>".
                                    "<p>Division: ".$num1/$num2."</p>";
                                    } else {
                                    echo "<h2>Los valores introducidos no son correctos</h2>";
                                    }
                              }
                              



                        ?>
                  </code>
            </div>
            <p class="pt-4 mx-3"><strong>Ejercicio 5.</strong> <br />
                  Hacer un programa que muestre todos los números entre dos números que nos lleguen por URL($_GET). El
                  primer número ha de ser menor que el segundo, si no es así informaremos al usuario y el programa
                  volverá al formulario para poder introducir los números. Una vez finalizado el script, este nos ha de
                  permitir volver l formulario para jugar de nuevo.</p>
            <div id="ejercicio5">
                  <code>
                  <form action="ejercicios1-7_Alumnos.php#ejercicio5" method="get">
                              <label id="labelNum3" for="num3">numero1</label>
                              <input type="number" aria-describedby="labelNum3" name="num3" id="num3" value="<?= isset($_GET['num3']) ? $_GET['num3'] : ""; ?>">
                              <label id="labelNum4" for="num4">numero2</label>
                              <input type="number" aria-describedby="labelNum4" name="num4" id="num4" value="<?= isset($_GET['num4']) ? $_GET['num4'] : ""; ?>">
                              <button type="submit">enviar</button>
                        </form>
                        <?php
                              function validarEj5 ($num1,$num2){
                                    if (is_numeric($num1)&&is_numeric($num2)){
                                          if($num1<$num2){
                                          return true;
                                          } else
                                          return false;
                                    } else {
                                    return false;
                                    }
                              }
                              if(!isset($_GET['num3'])|| !isset($_GET['num3'])){
                                    echo "<h2>por favor introduce valores en las cajas de formulario </h2>";
                              } else {
                                    $num3 = $_GET['num3'];
                                    $num4 = $_GET['num4'];

                                    if (validar($num3,$num4)){
                                          echo '<h2>numeros entre '.$num3." y ".$num4."<h2><br/>";
                                          for ($i=$num3;$i<=$num4;$i++){
                                                echo $i.'<br/>';
                                          }
                                    } else {
                                    echo "<h2>Los valores introducidos no son correctos</h2>";
                                    }
                              }
                              



                        ?>                      

                  </code>
            </div>
            <p class="pt-4 mx-3"><strong>Ejercicio 6.</strong> <br />
                  Mostrar una "table" de HTML con las tablas de multiplicar del 1 al 10.</p>
            <div>
                  <code>

                        <hr />
                        <?php
                        echo "<table><th></th>";
                        for ($x = 1; $x <= 10; $x++) {
                              echo "<th>" . $x . "</th>";
                        }
                        for($x=1;$x<=10;$x++){

                              echo "<tr>";

                              for($y=1;$y<=10;$y++){
                                    echo $y==1?  "<th>".$x."</th><td>" . $x * $y . "</td>" : "<td>" . $x * $y . "</td>";
                              }
                              echo "</tr>";
                        }
                        echo "</table>";
                        ?>

                  </code>
            </div>
            <p class="pt-4 mx-3"><strong>Ejercicio 7.</strong> <br />
                  Hacer un programa que muestre todos los números (indicando en cada número si es par o impar) entre dos
                  números que nos lleguen por URL($_GET) de un formulario. El primer número ha de ser menor que el
                  segundo, si no es así informaremos al usuario y permitiremos con un input de tipo button que vuelva al
                  formulario volveremos a introducir los números. Una vez finalizado el script, este nos ha de permitir
                  volver al formulario para jugar de nuevo.
            </p>
            <div class="ejercicio7">
                  <code>

                  </code>
            </div>
</body>

</html>