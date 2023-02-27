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
                    Detalle del Socio con código: <?php echo $socio->codigo; ?>
                </h3>
                <br />

                <form class="form-horizontal" id="f_detalle_socio_<?php echo $socio->codigo; ?>">

                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="codigo">Código</label>
                            <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $socio->codigo; ?>" readonly>
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="dni">DNI</label>
                            <input type="text" class="form-control" id="dni" name="dni" value="<?php echo $socio->dni; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="nombre">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $socio->nombre; ?>" readonly>
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="apellidos">Apellidos</label>
                            <input type="text" class="form-control" id="apellidos" name="apellidos" value="<?php echo $socio->apellidos; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                            <input type="date" class="form-control" id="fecha_nacimiento" name="fecha_nacimiento" value="<?php echo $socio->fecha_nacimiento; ?>" readonly>
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" id="email" name="email" value="<?php echo $socio->email; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="direccion">Dirección</label>
                            <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo $socio->direccion; ?>" readonly>
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="ciudad">Ciudad</label>
                            <input type="text" class="form-control" id="ciudad" name="ciudad" value="<?php echo $socio->ciudad; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="cp">Código Postal</label>
                            <input type="text" class="form-control" id="cp" name="cp" value="<?php echo $socio->cp; ?>" readonly>
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="provincia">Provincia</label>
                            <input type="text" class="form-control" id="provincia" name="provincia" value="<?php echo $socio->provincia; ?>" readonly>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="telefono">Teléfono</label>
                            <input type="tel" class="form-control" id="telefono" name="telefono" value="<?php echo $socio->telefono; ?>" readonly>
                        </div>
                        <div class="form-group col-xs-12 col-md-6">
                            <label for="fecha_alta">Fecha de Alta</label>
                            <input type="date" class="form-control" id="fecha_alta" name="fecha_alta" value="<?php echo $socio->fecha_alta; ?>" readonly>
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