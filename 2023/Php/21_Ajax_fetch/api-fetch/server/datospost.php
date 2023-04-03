<?php 

$usuario =$_REQUEST['usuario'];
$password =$_REQUEST['password'];

if($usuario==="" || $password==="") {
	echo json_encode('error');
}else{ 
	echo json_encode("Correcto: <br/>Usuario: ".$usuario. "<br/>Password: ".$password);
}