<?php

session_start();

if (isset($_GET['lang'])){
	if($_GET['lang']=='cast') {
		$_SESSION['idioma']='cast';
	} else if ($_GET['lang']=='cat') {
		$_SESSION['idioma']='cat';
	}

}	else if(!isset($_SESSION['idioma'])){
		$_SESSION['idioma']='cat';
}
require_once "lang/" . $_SESSION['idioma'] . ".php";




