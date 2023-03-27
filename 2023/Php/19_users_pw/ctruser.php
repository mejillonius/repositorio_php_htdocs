<?php
//aquest es el controller de els users que contendra una clase que fara de POCO dels users
class ctrUser
{
    //declarem les propietats de la clase
    protected $id;
    protected $username;
    protected $password;
    protected $email;
    protected $rol;


    //aquest es un metode especial que truquem quan creem un objecte de tipus users
    //cuando registramos un usuario nuevo todavia no tenemos un id asignado por eso la propiedad
    //en principio es null
    public function __construct($id = null, $username, $password, $email, $rol)
    {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->rol = $rol;
    }

    //creem els metodes getter per cambiar les propietats del objecte users
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
    public function getEmail()
    {
        return $this->email;
    }
    public function getRol()
    {
        return $this->rol;
    }

    //creem els metodes setter per cambiar les propietats del objecte users


    public function setUsername($username)
    {
        $this->username = $username;
    }
    public function setPassword($password)
    {
        $this->password = $password;
    }
    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function setRol($rol)
    {
        $this->rol = $rol;
    }
}
