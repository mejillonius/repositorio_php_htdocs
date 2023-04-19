<?php

class PwHash
{


    public static  function encryptPw($password)
    {
        $mima = password_hash($password, PASSWORD_DEFAULT);
        return $mima;
    }
    public static function decryptPw($password, $bdd)
    {
        return password_verify($password, $bdd);
    }
}
