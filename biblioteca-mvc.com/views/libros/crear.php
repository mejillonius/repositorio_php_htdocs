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
                        <div class="alert alert-success alert-dismissible fade show text-center" role="alert">
                            <?php echo $mensaje; ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                <?php
                    }
                ?>

                <h3>
                    Crear nuevo Libro
                </h3>
                <br />

                <form class="form-horizontal" id="f_detalle_libro" method="post">

                    <input type="hidden" name="crear" value="ok" />

                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="isbn">ISBN</label>
                            <input type="text" class="form-control" id="isbn" name="isbn" value="" required maxlength="32">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="" required maxlength="64">
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="editorial">Editorial</label>
                            <input type="text" class="form-control" id="editorial" name="editorial" value="" required maxlength="64">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="idioma">Idioma</label>
                            <input type="text" class="form-control" id="idioma" name="idioma" value="" required maxlength="64">
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="autor">Autor</label>
                            <input type="text" class="form-control" id="autor" name="autor" value="" required maxlength="256">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="n_ediciones">Nº Ediciones</label>
                            <input type="number" class="form-control" id="n_ediciones" name="n_ediciones" step="1" min="1"  value="" required maxlength="11">
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="edad_recomendada">Edad Recomendada</label>
                            <input type="number" class="form-control" id="edad_recomendada" name="edad_recomendada" step="1" min="4"  value="" required maxlength="11">
                        </div>
                    </div>


                    <div class="form-group row">
                        <div class="col-sm-12">
                            <button type="submit" class="btn btn-standard btn-block">
                                <i class="fa fa-save"></i> Guardar
                            </button>
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