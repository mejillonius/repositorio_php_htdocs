<!doctype html>
<html class="no-js" lang="es">

<!-- Incluir el head -->
<?php include '../views/head.php'; ?>



<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Incluir el header -->
<?php include '../views/header.php'; ?>



<!-- MAIN CONTENT -->
<div class="container">

    <section class="main_content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <div class="error_windows">
                    <h3>
                        ERROR
                    </h3>
                    <?php echo $mensaje; ?>
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
<?php include '../views/footer.php'; ?>


</body>
</html>