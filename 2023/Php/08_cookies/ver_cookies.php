<?php

if(isset($_COOKIE['unyear'])){
    echo "<h2>la cookie unyear tiene valor: " . $_COOKIE['unyear'] . "<h2>";
}else{
    echo "<h2>la cookie unyear no existe<h2>";
}

echo isset($_COOKIE['unyear']) ? "<h2>la cookie unyear tiene el valor: " . $_COOKIE['unyear'] . "<h2>" : "<h2>la cookie unyear no existe<h2>";
?>
<a href="crear_cookie.php">ir a guardar cookies</a> || <a href="borrar_cookies.php">ir a borrar cookies</a>