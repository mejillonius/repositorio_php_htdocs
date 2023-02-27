<?php

   if(session_id() == ''){
    session_start();
 }
/* require_once('./controller/config.php'); */
require(CONTROL.'idiomas.php');

function cargaInicial() {
    
    insertarTexto(VIEW.'header.tpl');
    insertarTexto(VIEW.'bodyForm.tpl');
    insertarTexto(VIEW.'footer.tpl');
}

cargaInicial();