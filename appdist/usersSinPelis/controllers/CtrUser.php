<?php

class CtrUser
{

    protected $id;
    protected $username;
    protected $password;
    protected $rol;
    protected $email;

    public function __construct($id = null, $username, $password, $rol = null, $email)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->rol = $rol;
        $this->email = $email;
    }


    public function getId()
    {
        return $this->id;
    }
    public function getUsername()
    {
        return $this->username;
    }
    public function getPassword()
    {
        return $this->password;
    }
    public function getRol()
    {
        return $this->rol;
    }
    public function getEmail()
    {
        return $this->email;
    }

    public function setId($id)
    {
        $this->id = $id;
    }
    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setRol($rol)
    {
        $this->rol = $rol;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
}
