<nav class="container bg-light">
    <div class="container-fluid py-4">
        <div class="justified ">
            <a href="<?= url_base ?>">
                <h3>CRUD de Películas</h3>
            </a>
        </div>
    </div>

<div class="container">

<ul class="nav nav-justified py-2 nav-pills">

    <?php if (isset($_GET["tpls"])) : ?>

        <?php if ($_GET["tpls"] == "agregarPelicula") : ?>

            <li class="nav-item">
                <a class="nav-link active" href="<?= url_base ?>agregarPelicula/">Agregar Película</a>
            </li>

        <?php else : ?>

            <li class="nav-item">
                <a class="nav-link" href="<?= url_base ?>agregarPelicula/">Agregar Película</a>
            </li>

        <?php endif ?>


        <?php if ($_GET["tpls"] == "inicio") : ?>

            <li class="nav-item">
                <a class="nav-link active" href="<?= url_base ?>">Inicio</a>
            </li>

        <?php else : ?>

            <li class="nav-item">
                <a class="nav-link" href="<?= url_base ?>">Inicio</a>
            </li>

        <?php endif ?>



    <?php else : ?>



        <li class="nav-item">
            <a class="nav-link active" href="<?= url_base ?>agregarPelicula/">Agregar Película</a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="<?= url_base ?>">Inicio</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" href="<?= url_base ?>registro/">registro</a>
        </li>


        <li class="nav-item">
            <a class="nav-link" href="<?= url_base ?>login/">login</a>
        </li>

    <?php endif ?>

</ul>

</div>

</nav>