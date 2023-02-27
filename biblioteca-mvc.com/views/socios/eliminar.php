<!doctype html>
<html class="no-js" lang="es">

<!-- Incluir el head -->
<?php include VIEWS_ROUTE . 'head.php'; ?>



<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- Incluir el header -->
<?php include VIEWS_ROUTE . 'header.php'; ?>



<!-- MAIN CONTENT -->
<div class="container">

    <section class="main_content">
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                <?php
                    if(!empty($mensaje))
                    {
                ?>
                        <div class="alert alert-success text-center" role="alert">
                            <?php echo $mensaje;?>
                        </div>
                        <p class="text-center">
                            <a class="btn btn-primary" href="?section=socios&action=listar">
                                Volver al Listado <i class="fa fa-undo" aria-hidden="true"></i>
                            </a>
                        </p>

                <?php
                    }
                    else
                    {
                ?>
                        <h3>
                            Confirmación de la Baja del Socio con código: <?php echo $socio->codigo; ?>
                        </h3>

                        <?php echo $socio;?>

                        <div class="message-confirm">

                            <p class="text-center">
                                ¿Está seguro de querer eliminar este socio?
                            </p>

                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <form method="post">
                                        <input type="hidden" name="codigo_socio_baja" value="<?=$socio->codigo?>">
                                        <div class="form-group row">
                                            <div class="col-sm-12">
                                                <p class="text-center">
                                                    <button type="submit" class="btn btn-danger">
                                                        <i class="fa fa-trash-o"></i> Eliminar Socio
                                                    </button>
                                                </p>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                    <p class="text-center">
                                        <a class="btn btn-primary" href="?section=socios&action=listar">
                                            Volver al Listado <i class="fa fa-undo" aria-hidden="true"></i>
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </div>

                <?php
                    }
                ?>



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
<?php include VIEWS_ROUTE . 'footer.php'; ?>


</body>
</html>