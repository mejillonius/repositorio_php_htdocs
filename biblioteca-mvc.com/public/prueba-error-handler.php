<!doctype html>
<html class="no-js" lang="es">

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

<!-- HEADER -->
<header>
    <div class="container">


        <section class="header_princ">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 offset-md-2 offset-lg-2">
                    <h1>
                        Prueba Error Handler
                    </h1>
                    <h2>
                        texto
                    </h2>
                </div>
            </div>
        </section>
        <section class="menu_web">
            <nav class="navbar navbar-expand-lg navbar-standard">
                <a class="navbar-brand" href="#">
                    Navbar
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="#">
                                Home <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">
                                Link
                            </a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="#">
                                    Action
                                </a>
                            </div>
                        </li>
                    </ul>

                </div>
            </nav>
        </section>

    </div>
</header>

<!-- MAIN CONTENT -->
<div class="container">

    <section class="main_content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <form action="prueba-post-form.php" class="form-horizontal form_ajax" id="f" method="post" enctype="multipart/form-data" novalidate>

                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="surname">Surname</label>
                            <input type="text" class="form-control" id="surname" name="surname" placeholder="Surname">
                        </div>

                    </div>





                    <br />
                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-standard btn-block">
                                <i class="fa fa-save"></i> Guardar
                            </button>
                        </div>
                    </div>

                </form>


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


<!-- FOOTER -->
<footer>
    <div class="container">
        <section class="footer_princ">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                    <p class="text-right">
                        plantilla
                    </p>

                </div>
            </div>
        </section>
    </div>

</footer>


<script src="/js/vendor/modernizr-3.6.0.min.js"></script>
<script src="/js/vendor/jquery-3.3.1.min.js"></script>

<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>

<script src="/js/plugins.js"></script>
<script src="/js/main.js"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $.ajax({
            url: 'prueba-post-form.php',
            type: "POST",
            data: {num:1},
            dataType: "json"
        }).done(function(response) {

            console.info(response);
        }).fail(function(e, o) {
            console.info('fail');
        });
    });
</script>



</body>

</html>
