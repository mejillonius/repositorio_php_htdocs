<?php
/****************************************************
 * Constantes de Configuración de la Base de Datos
 ***************************************************/
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PASS','');
define('DB_NAME','biblioteca');
define('DB_CHARSET','utf8');

/***************************
 * Modo DEBUG
 ***************************/
define('DEBUG',false);

/********************************
 *  Rutas de los directorios
 ********************************/
define('CONTROLLER_ROUTE','../controllers/');
define('LIB_ROUTE','../lib/');
define('MODELS_ROUTE','../models/');
define('VIEWS_ROUTE','../views/');

/***************************
 * Página por defecto
 ***************************/
define('DEFAULT_SECTION','portada');
define('DEFAULT_ACTION','inicio');


/***************************
 * Si hay LOGIN
 ***************************/
define('LOGIN',true);

/***************************
 * Si hay Multiidioma
 ***************************/
define('MULTILANG',false);
