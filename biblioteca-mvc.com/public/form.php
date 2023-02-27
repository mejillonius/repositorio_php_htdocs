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
                        Titulo
                    </h1>
                    <p>
                        texto
                    </p>
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

                <form action="#" class="form-horizontal form_ajax_" id="f" method="post" enctype="multipart/form-data">
                    <input name="_token" type="hidden" value="" />
                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="exampleFormControlInput1">Email address</label>
                            <input type="email" class="form-control" id="exampleFormControlInput1" name="email" placeholder="name@example.com">
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password" name="password" placeholder="password">
                        </div>
                    </div>

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



                    <div class="form-group">
                        <label for="exampleFormControlSelect1">Example select</label>
                        <select class="form-control" id="exampleFormControlSelect1" name="selector">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlFile1">Example file input</label>
                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="fichero">
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck1" name="checky">
                        <label class="form-check-label" for="defaultCheck1">
                            Default checkbox 1
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="" id="defaultCheck2" name="checky">
                        <label class="form-check-label" for="defaultCheck2">
                            Default checkbox 2
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
                        <label class="form-check-label" for="exampleRadios1">
                            Default radio
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
                        <label class="form-check-label" for="exampleRadios2">
                            Second default radio
                        </label>
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

    });
</script>



</body>

</html>
