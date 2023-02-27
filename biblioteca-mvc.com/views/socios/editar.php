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
                    Datos del Socio con código: <?php echo $socio->codigo; ?>
                </h3>
                <br />

                <form class="form-horizontal" id="f_detalle_socio_<?php echo $socio->codigo; ?>" method="post">

                    <input type="hidden" name="editar" value="ok" />

                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="codigo">Código</label>
                            <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $socio->codigo; ?>" readonly required>
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="dni">DNI</label>
                            <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $socio->dni; ?>" pattern="[\dXYZxyz]\d{7}[a-zA-Z]" title="DNI válido" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $socio->nombre; ?>" required maxlength="64">
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $socio->apellidos; ?>" required maxlength="128">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $socio->fecha_nacimiento; ?>" required>
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $socio->email; ?>" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $socio->direccion; ?>" required maxlength="128">
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="ciudad">Ciudad</label>
                            <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo $socio->ciudad; ?>" required maxlength="128">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="cp">Código Postal</label>
                            <input type="text" class="form-control" id="cp" name="cp" value="<?php echo $socio->cp; ?>" required maxlength="5" minlength="5">
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="provincia">Provincia</label>
                            <input type="text" class="form-control" id="provincia" name="provincia" value="<?php echo $socio->provincia; ?>" required maxlength="128">
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="telefono">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $socio->telefono; ?>" required>
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="fecha_alta">Fecha de Alta</label>
                            <input type="date" class="form-control" id="fecha_alta" name="fecha_alta" value="<?php echo $socio->fecha_alta; ?>" required>
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
                    <a href="?section=socios&action=listar" class="btn btn-primary">
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