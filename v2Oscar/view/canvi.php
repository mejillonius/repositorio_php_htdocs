<?php
if (isset($_GET['canvi'])) {
    $params = $_SESSION['params'];

    $params = array_merge($params, $lang_feedback);
    montaViews($params, "../view/tpls/vista_ok.tpl");
    exit;
}