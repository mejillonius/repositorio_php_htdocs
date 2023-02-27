<?php

class ClasePadre {

    protected $saludo = "hola. buenas tardes";
    public static function metodoPadre(){
        return "<p>Hola desde la clase padre </p>";
    }
    public function metodoHeredado(){
        return "<p>metodo desde la clase padre y heredado por la clase hija</p>";
    }
    public function otroMetodo(){
        return "<p>otro metodo de la clase padre</p>";
    }
}

class ClaseHijo extends ClasePadre {

    public function otroMetodo(){
        return "<p>otro metodo desde la clase hijo</p>";
    }
    public static function metodoHijo(){
        return parent::metodoPadre();
    }
}

echo ClaseHijo::metodoHijo();

$objeto = new ClaseHijo();
echo $objeto->otroMetodo();
echo $objeto->metodoHeredado();

$objeto2 = new ClasePadre();
echo $objeto2->otroMetodo();

?>