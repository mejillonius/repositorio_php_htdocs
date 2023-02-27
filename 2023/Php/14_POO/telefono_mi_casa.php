<?php


class Telefono
{
      public $marca;
      public $model;
      protected $cable;
      protected $comunicacio;

      public function __construct()
      {
      }
      public function trucar()
      {
      }
      public function info()
      {
      }
}

class Mobil extends Telefono
{
}
final class Smart extends Mobil
{
      private $internet;
      private $con;
}
