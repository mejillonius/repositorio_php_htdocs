<?php
class AccesoPrivate {
    private $adeu = "Adeu";
    public $hola="hola";

    

    private function despedir(){
        return "Si, me despido de ti";
    }

    public function getAdeu(){
        return $this->adeu." - ".$this->despedir().'<br/>';
    }
}

$objeto = new AccesoPrivate();
echo $objeto->getAdeu();
echo $objeto->hola.'<br/>';
// echo $objeto->adeu; // <- peta por que es privado
?>