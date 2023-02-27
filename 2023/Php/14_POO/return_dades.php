<?php
class RetornoDatos
{
      public function torna_string($edad)
      {
            if ($edad > 18) {
                  $resul = "Enhorabona ets major d'edat";
            } else {
                  $resul = "SE SIENTEEEEEEEE";
            }
            return $resul;
      }
      public function torna_array($itera)
      {
            $dades = [];
            for ($i = 0; $i < $itera; $i++) {
                  $dades[$i] = "Repe: " . $i . "<br>";
                  echo $dades[$i];
            }
            return true;
      }
      public function torna_json()
      {
            $dades = [
                  "primero" => 500,
                  "segundo" => "El segundo valor",
                  "tercero" => 100
            ];
            return print(json_encode($dades));
      }
}
