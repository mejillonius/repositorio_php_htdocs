<?php
session_start();

if (isset($_GET['lang'])) {
      if ("cast" == $_GET['lang']) {
            $_SESSION['idioma'] = "cast";
      } elseif ("ca" == $_GET['lang']) {
            $_SESSION['idioma'] = "ca";
      }
} elseif (!isset($_SESSION['idioma'])) {
      $_SESSION['idioma'] = "ca";
}
require $_SESSION['idioma'] . ".php";

function cabecera($lang)
{
?>
      <!DOCTYPE html>
      <html>

      <head>
            <meta charset="utf-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">

            <!-- <title></title> -->
            <title><?php echo $lang["title"]; ?></title>
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
      </head>

      <body>
            <header>
                  <nav class="navbar navbar-light bg-light justify-content-between">
                        <a class="navbar-brand"><?php echo $lang["logo"]; ?></a>
                        <form class="form-inline" method="GET">
                              <label class="mr-sm-2" for="inlineFormCustomSelectPref"><?php echo $lang["cambiar_idioma"]; ?></label>
                              <select class="custom-select mb-2 mr-sm-2 mb-sm-0" name="lang">
                                    <option selected><?php echo $lang["opcion_1"]; ?></option>
                                    <option value="cast"><?php echo $lang["opcion_2"]; ?></option>
                                    <option value="ca"><?php echo $lang["opcion_3"]; ?></option>
                              </select>
                              <button type="submit" class="btn btn-primary"><?php echo $lang["cambiar"]; ?></button>
                        </form>
                  </nav>
            </header>
            <div class="container-fluid">
                  <?php menu($lang); ?>
                  <div class="row">
                        <div class="col-8">
                              <h3><?php echo $lang["descripcion"]; ?></h3>
                        </div>
                  </div>
            </div>
      <?php
}

function principal($lang)
{
      ?>

            <div class="container-fluid">
                  <h1><?php echo $lang["titular"]; ?></h1>

                  <p><?php echo $lang['cont1']; ?></p>
                  <p><?php echo $lang['cont2']; ?></p>
                  <p><?php echo $lang['cont3']; ?></p>

            </div>
      <?php
}

function menu($lang)
{
      echo "<a href='index.php'>" . $lang['m1'] . "</a> || <a href='producto.php'>" . $lang['m2'] . "</a>";
}

function footer($lang)
{
      ?>
            <footer class="container-fluid">
                  <h2><?php echo $lang['foot']; ?></h2>
                  <a href="?lang=cast">es</a> || <a href="?lang=ca">cat</a>
            </footer>
      </body>

      </html>
<?php
}
function footer2($lang)
{
?>
      <footer class="container-fluid">
            <h2><?php echo $lang['foot2']; ?></h2>
            <h3><?php echo $lang['foot3']; ?></h3>
            <a href="?lang=cast">es</a> || <a href="?lang=ca">cat</a>
      </footer>
      </body>

      </html>
<?php
}

?>