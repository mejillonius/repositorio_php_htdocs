<?php

if ($_COOKIE['micookie']){
    setcookie("micookie","",time()-1);
}
if ($_COOKIE['unyear']){
    setcookie('unyear',"",time()-1);
}

header('location:ver_cookies.php');