<?php

class PwHash {

    //funcion para hashear la pw
    static public function encryptPw($password){
        $mima = password_hash($password, PASSWORD_DEFAULT);
        return $mima;
    }

    //funcion para verificar si la password hasheada coincide con el registro
    static public function decryptPw($password, $bdd)
    {
        return password_verify($password, $bdd);
    }
}