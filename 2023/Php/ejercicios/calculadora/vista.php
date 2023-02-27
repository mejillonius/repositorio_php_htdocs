<?php

function vista_form() {
    $html = file_get_contents("form.tpl");
    echo $html;
    exit;
}

function vista_results($result) {
    $html = file_get_contents("results.tpl");
    $html = str_replace("{:result:}", $result, $html);
    echo $html;  
    exit;
}

?>