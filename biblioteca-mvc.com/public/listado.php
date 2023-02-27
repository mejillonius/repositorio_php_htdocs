<?php

    //Conectar con la BDD
    $conexion=new mysqli('localhost','root','','ej1_informatica');
    $conexion->set_charset('utf8');

    // Recuperar el listado de los fabricantes
    // Preparar la consulta
    $consulta = "SELECT * FROM fabricantes";

    // Ejecutar la consulta contra la BDD
    $resultados = $conexion->query($consulta);

    // Recuperar los resultados y volcarlos a un array
    $fabricantes =  [];

    while($f=$resultados->fetch_object())
        $fabricantes=[$f];

    var_dump($fabricantes);

?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="manifest" href="site.webmanifest">
    <link rel="apple-touch-icon" href="icon.png">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/main.css">

    <link rel="stylesheet" href="/css/style.css">



</head>

<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Add your site or application content here -->

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-lg-12 ">
            <h1>
                Listado de Fabricantes
            </h1>

            <table class="table table-responsive">

            </table>

            <form method="POST" action="http://finquesvalldhebron.es/es/p/contact" accept-charset="UTF-8" class="form-horizontal form_ajax contact_form" novalidate="novalidate" enctype="multipart/form-data" name="contacta" id="contact_form"><input name="_token" type="hidden" value="wZculzdFf5zV9e5Zq65PMdejKwTeXdEdFQG0J18b">

                <input type="hidden" name="referencia" id="referencia" value="1">

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="name">Persona de contacto</label>
                        <input class="form-control" max-lenght="255" name="name" id="name" placeholder="Persona de contacto" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="phone">Teléfono</label>
                        <input class="form-control" max-lenght="255" name="phone" id="phone" placeholder="Teléfono" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="email">Email</label>
                        <input class="form-control" max-lenght="255" name="email" id="email" placeholder="Email" type="text">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <label for="message">Comentarios</label>
                        <textarea class="form-control border_bottom" name="message" id="message" placeholder="Hola, quería saber..." cols="50" rows="10"></textarea>
                    </div>
                </div>


                <div class="checkbox">
                    <label>
                        <input type="checkbox" name="politica">
                        Acepto la
                        <a href="http://finquesvalldhebron.es/es/poltica-de-privacidad" target="_blank">
                            política de privacidad
                        </a>.
                    </label>
                </div>
                <div id="politica"></div>

                <div class="form-group">
                    <div class="col-xs-12">
                        <p class="text-center">
                            <button type="submit" class="btn btn-standard">
                                más información
                            </button>
                        </p>
                    </div>
                </div>



            </form>
        </div>
    </div>


</div>



<script src="/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="/js/vendor/jquery-3.3.1.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<script src="/js/plugins.js"></script>
<script src="/js/main.js"></script>

<!-- Google Analytics: change UA-XXXXX-Y to be your site's ID. -->
<script>
    window.ga = function () { ga.q.push(arguments) }; ga.q = []; ga.l = +new Date;
    ga('create', 'UA-XXXXX-Y', 'auto'); ga('send', 'pageview')
</script>
<script src="https://www.google-analytics.com/analytics.js" async defer></script>
</body>

</html>
