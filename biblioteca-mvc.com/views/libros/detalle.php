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

                <h3>
                    Detalle del Libro con código: <?php echo $libro->codigo; ?>
                </h3>
                <br />

                <form class="form-horizontal" id="f_detalle_libro_<?php echo $libro->codigo; ?>">


                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="codigo">Código</label>
                            <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $libro->codigo; ?>" readonly>
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="isbn">ISBN</label>
                            <input type="text" class="form-control" id="isbn" name="isbn" value="<?php echo $libro->isbn; ?>" readonly maxlength="32">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $libro->titulo; ?>" readonly maxlength="64">
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="editorial">Editorial</label>
                            <input type="text" class="form-control" id="editorial" name="editorial" value="<?php echo $libro->editorial; ?>" readonly maxlength="64">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="idioma">Idioma</label>
                            <input type="text" class="form-control" id="idioma" name="idioma" value="<?php echo $libro->idioma; ?>" readonly maxlength="64">
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="autor">Autor</label>
                            <input type="text" class="form-control" id="autor" name="autor" value="<?php echo $libro->autor; ?>" readonly maxlength="256">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="n_ediciones">Nº Ediciones</label>
                            <input type="number" class="form-control" id="n_ediciones" name="n_ediciones" step="1" min="1"  value="<?php echo $libro->n_ediciones; ?>" readonly maxlength="11">
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="edad_recomendada">Edad Recomendada</label>
                            <input type="number" class="form-control" id="edad_recomendada" name="edad_recomendada" step="1" min="4"  value="<?php echo $libro->edad_recomendada; ?>" readonly maxlength="11">
                        </div>
                    </div>

                </form>

                <p class="text-right">
                    <br />
                    <a href="?section=libros&action=listar" class="btn btn-primary">
                        Volver al Listado <i class="fa fa-undo" aria-hidden="true"></i>
                    </a>
                </p>

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