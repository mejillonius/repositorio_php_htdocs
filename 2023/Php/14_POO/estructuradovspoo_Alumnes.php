<?php
$automobil1 = ["marca" => "Toyota", "model" => "Corolla"];
$automobil2 = ["marca" => "Hyundai", "model" => "AccentVision"];

function mostrar($automobil)
{
      echo "<p>Hola! sòc un $automobil[marca], model: $automobil[model]</p>";
}

mostrar($automobil1);
mostrar($automobil2);

//POO


//version antes de la 8
/* class Automobil
{
      public $marca;
      public $model;

      public function __construct($marca, $model){
            $this->marca = $marca;
            $this->model = $model;
      }

      public function setMarca($marca)
      {
            $this->marca = $marca;
      }
      public function setModel($model)
      {
            $this->model = $model;
      }
      public function getDatos()
      {
            echo "<p>Hola! sòc un {$this->marca}, model: {$this->model}.</p>";
      }
};

$a = new Automobil('Toyota','Corolla');
$a->getDatos();
$b = new Automobil('Ferrari','Enzo');
$b->getDatos(); */

//version despues de la 8 en teoria mas rapida
class Automobil
{


      public function __construct(public $marca, public $model){

      }

      public function setMarca($marca)
      {
            $this->marca = $marca;
      }
      public function setModel($model)
      {
            $this->model = $model;
      }
      public function getDatos()
      {
            echo "<p>Hola! sòc un {$this->marca}, model: {$this->model}.</p>";
      }
};

$a = new Automobil('Toyota8','Corolla');
$a->getDatos();
$b = new Automobil('Ferrari8','Enzo');
$b->getDatos();


