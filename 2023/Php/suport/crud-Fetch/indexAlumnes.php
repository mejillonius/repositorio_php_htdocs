<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD php - API fetch</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header bg-primary">
                        <h3 class="text-center">Registro de productos</h3>
                    </div>
                    <div class="card-body">
                        <form action="" method="post" id="frm"><!-- No multipart/form-data -->
                            <div class="form-group">
                                <label for="">Codigo</label>
                                <input type="hidden" name="idp" id="idp" value="">
                                <input type="text" name="codigo" id="codigo" placeholder="Codigo" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Producto</label>
                                <input type="text" name="producto" id="producto" placeholder="Descripción" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Precio</label>
                                <input type="text" name="precio" id="precio" placeholder="Precio" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Cantidad</label>
                                <input type="text" name="cantidad" id="cantidad" placeholder="cantidad" class="form-control">
                            </div>
                            <div class="form-group">
                                <input type="button" value="Registrar" id="registrar" class="btn btn-primary btn-block">
                                <input type="hidden" value="Crear Nuevo Producto" id="nuevoProducto" class="btn btn-danger btn-block">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="row">
                    <div class="col-lg-6 ml-auto">
                        <form action="" method="post">
                            <div class="form-group">
                                <label for="buscra">Buscar:</label>
                                <input type="text" name="buscar" id="buscar" placeholder="Buscar..." class="form-control">
                            </div>
                        </form>
                    </div>
                </div>
                <table class="table table-hover table-resposive">
                    <thead class="thead-dark">
                        <tr>
                            <th>ID</th>
                            <th>Descripción</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody id="resultado">
                        
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- carreguem el sweet alert per mostrar missatges de control a través de pantalla -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="app.js"></script>
   

</body>

</html>