<!doctype html>
<html class="no-js" lang="es">

<!-- Incluir el head -->
<?php include VIEWS_ROUTE.'head.php'; ?>



<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Incluir el header -->
<?php include VIEWS_ROUTE.'header.php'; ?>



<!-- MAIN CONTENT -->
<div class="container">

    <section class="main_content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <h3>
                    Bienvenido a la Biblioteca
                    <?php
                        if(!empty($_SESSION['user']))
                            echo "Usuario Administrador"
                    ?>
                </h3>
                <br />

                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h4>
                            Información
                        </h4>

                        <p>
                            En esta práctica he utilizado virtual hosts.
                        </p>
                        <p>
                            He modificado el archivo: C:\xamppp\apache\conf\extra\httpd-vhosts.conf
                        </p>
                        <p>
                            Con el siguiente código:
                        </p>
<pre>
&lt;VirtualHost *:80&gt;
    ServerAdmin webmaster@dummy-host2.example.com
    DocumentRoot "C:/xampp/htdocs/biblioteca-mvc.com/public"
    ServerName biblioteca-mvc.com
    ServerAlias www.biblioteca-mvc.com
    ErrorLog "logs/biblioteca-mvc.com-error.log"
    CustomLog "logs/biblioteca-mvc.com-access.log" common
&lt;/VirtualHost&gt;
</pre>

                        <p>
                            He modificado el archivo: C:\Windows\System32\drivers\etc\hosts
                        </p>
                        <p>
                            Añadiendo el siguiente código al final:
                        </p>
                        <pre>
	127.0.0.1 	www.biblioteca-mvc.com
	127.0.0.1 	biblioteca-mvc.com
</pre>

                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                        <h3>
                            Para la gestión:
                        </h3>
                        <br />
                        <p>
                            Las acciones que se pueden realizar en la web sin estar logueado, unicamente serán:
                        </p>
                        <ul>
                            <li>
                                Visitar la Portada
                            </li>
                            <li>
                                Ver el Listado de Libros
                            </li>
                        </ul>
                        <p>
                            La gestión de Socios y la de Libros sólo se mostrará completa estando logueado.
                        </p>
                        <p>
                            Recuerdo los datos de Login
                        </p>
                        <div class="alert alert-primary" role="alert">
                            <b>USER: </b>admin
                            <b>PASS: </b>1234
                        </div>


                    </div>
                </div>








            </div>
        </div>
    </section>

    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <div id="boxtoup">
                <a href="javascript:void(0)" class="btn">
                    <i class="fa fa-arrow-up fa-lg" aria-hidden="true"></i>
                </a>
            </div>
        </div>
    </div>
</div>


<!-- Incluir el Footer -->
<?php include VIEWS_ROUTE.'footer.php'; ?>


</body>
</html>