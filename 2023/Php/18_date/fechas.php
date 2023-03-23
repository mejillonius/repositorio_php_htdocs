<?php
$fecha = new DateTime();
echo $fecha->format('Y-m-d H:i:s') . "\n";
echo "<br>";
$fecha->setTimestamp(1171502725);
echo $fecha->format('d-m-Y H:i:s') . "\n";
echo "<br>";
$fecha_actual = strtotime(date("d-m-Y H:i:s", time()));
echo "<br>";
var_dump(date("d-m-Y H:i:s", $fecha_actual));
echo "<br>";

echo "<br>";
$fecha_entrada = strtotime("19-11-2022 21:00:00");

echo "<br>";
$fecha = new DateTime();
echo $fecha->getTimestamp();


echo "<br>";
$fecha = date_create('12-12-2000');
echo date("d-m-Y H:i:s", date_timestamp_get($fecha));
