<header>
    <div class="container">

        <?php
            if(LOGIN === true or MULTILANG === true)
            {
        ?>
                <section class="login_user">
                    <div class="row">
                        <div class="col-xs-12 col-sm-3 offset-sm-9 col-md-4 offset-md-8 col-lg-4 offset-lg-8">
                            <div class="languagesandregister">
                                <ul class="list-inline">
                                    <?php
                                        if(MULTILANG === true)
                                        {
                                    ?>
                                            <li class="list-inline-item">
                                                <ul class="list-inline languagues_list">
                                                    <li class="list-inline-item">
                                                        <a href="#" class="active">
                                                            es
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#" class="">
                                                            ca
                                                        </a>

                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a href="#" class="">
                                                            en
                                                        </a>
                                                    </li>
                                                </ul>
                                            </li>

                                    <?php
                                        }
                                    ?>

                                    <?php
                                    if(LOGIN === true)
                                    {
                                        if(!empty($_SESSION['user']))
                                        {
                                    ?>
                                            <li class="login list-inline-item">
                                                <form action="index.php?section=login&action=login" class="form-horizontal" id="f_logout" method="post">
                                                    <input name="logout" type="hidden" value="ok" />
                                                    <button type="submit" class="btn">
                                                        Logout <i class="fa fa-sign-out" aria-hidden="true"></i>
                                                    </button>
                                                </form>
                                            </li>

                                    <?php
                                        }
                                        else
                                        {
                                    ?>
                                            <li class="login list-inline-item">
                                                <a href="#" class="btn display_toggle" rel=".loginandregister" speed="slow">
                                                    <i class="fa fa-user" aria-hidden="true"></i>
                                                    Login
                                                </a>
                                            </li>

                                    <?php
                                        }
                                    }
                                    ?>

                                </ul>
                            </div>
                        </div>
                    </div>


                    <?php
                    if(LOGIN === true)
                    {
                        if(empty($_SESSION['user'])) {
                            ?>
                            <div class="row">
                                <div class="col-xs-12 col-sm-12 col-md-6 offset-md-6 col-lg-6 offset-lg-6">
                                    <div class="loginandregister imdisplayed">
                                        <div class="row">
                                            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                                                <h3>
                                                    Entrar
                                                </h3>
                                                <form action="index.php?section=login&action=login"
                                                      class="form-horizontal" id="f_login" method="post">
                                                    <input type="hidden" name="login" value="login"/>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text" id="email">
                                                            <i class="fa fa-user" aria-hidden="true"></i>
                                                        </span>
                                                        </div>
                                                        <input type="text" class="form-control" name="user"
                                                               placeholder="Usuario" aria-label="user" id="user"
                                                               aria-describedby="user">
                                                    </div>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                        <span class="input-group-text" id="password">
                                                            <i class="fa fa-key" aria-hidden="true"></i>
                                                        </span>
                                                        </div>
                                                        <input type="password" class="form-control"
                                                               placeholder="Password" aria-label="password"
                                                               name="password" id="password"
                                                               aria-describedby="password">
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                            <a href="#">
                                                                He olvidado la contraseña
                                                            </a>

                                                        </div>
                                                        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
                                                            <div class="form-group row">
                                                                <div class="col-sm-12">
                                                                    <button type="submit"
                                                                            class="btn btn-standard btn-block">
                                                                        Entrar
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <?php
                        }
                    }
                    ?>


                </section>

        <?php
            }
        ?>


        <section class="header_princ">
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-10 col-lg-10 offset-md-2 offset-lg-2">
                    <?php
                    if(!empty($title_content))
                        echo "<h1>$title_content</h1>";

                    if(!empty($subtitle_content))
                    echo "<h2>$subtitle_content</h2>";
                    ?>
                </div>
            </div>
        </section>
        <section class="menu_web">
            <?php
                if(!empty($menu) and count($menu->items) > 0)
                    $menu->makeMenu();
            ?>
        </section>

    </div>
</header>