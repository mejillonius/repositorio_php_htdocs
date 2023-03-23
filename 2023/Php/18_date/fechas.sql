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
?>
#MYSQL

SELECT NOW(); # ejemplo: '2020-01-12 10:50:43'


/* Obtener solo día mes y año en MySQL
Código : */

SELECT CURDATE(); # ejemplo: '2020-01-12' #sin hora


/* Obtener hora actual en MySQL
Código : */

SELECT CURTIME(); #Selecciona la hora


/* Obtener día, mes, año, u hora de una fecha en MySQL

El formato de la fecha debe ser YYYY-MM-DD HH:MM:SS, aunque para obtener el año, mes o día solo es necesario YYYY-MM-DD

Código : */

SELECT YEAR(NOW()); #Selecciona el año
SELECT MONTH (NOW()) as mes; #Selecciona el mes
SELECT DAY(NOW()) as dia; #Selecciona el día
SELECT TIME(NOW()) as hora; #Selecciona la hora
SELECT LAST_DAY(NOW()); # Selecciona el ultimo dia del mes
/*
También existe MICROSECOND, SECOND, MINUTE, HOUR, MONTHNAME, etc.


Dar formato a una fecha en MySQL */

/* Para esto usamos Date_format, DATE_FORMAT(fecha,formato); ejemplo:

Código : */

SELECT DATE_FORMAT(now(),'%Y/%M/%d'); # '2020/January/12'
SELECT DATE_FORMAT(now(),'%Y-%M-%d %h:%i:%s %p'); #'2020-January-12 12:34:29 AM'
SELECT DATE_FORMAT(now(),'%W %d %M %Y'); # 'Tuesday 12 January 2020'
SELECT DATE_FORMAT(now(),'El año actual es %Y'); # 'El año actual es 2020'

#Estos son algunos de los especificadores que tenemos disponibles para dar formato a una fecha, la lista completa pueden verla en los manuales de MySql: -->

#Código :

- %d #Día del mes numérico (00...31)
- %H #Hora (00...23)
- %h #Hora (01...12)
- %i #Minutos, numérico (00...59)
- %M #Nombre mes (January...December)
- %m #Mes, numérico (00...12)
- %p #AM o PM
- %W #Nombre día semana (Sunday...Saturday)
- %Y #Año, numérico, cuatro dígitos
- %y #Año, numérico (dos dígitos)
- %s #Segundos (00...59)



#Sumar o restar días a una fecha con DATE_ADD o DATE_SUB en MySQL

DATE_ADD(fecha,INTERVAL valor tipo), DATE_SUB(fecha,INTERVAL valor tipo)

/* <!-- 
Sumar tiempo en MySQL
Código : --> */

SELECT DATE_ADD(NOW(),INTERVAL 20 DAY); # Agrega 20 días a la fecha actual
SELECT DATE_ADD(NOW(),INTERVAL 30 MINUTE); # Agrega 30 minutos a la fecha actual
SELECT DATE_ADD(NOW(),INTERVAL 50 YEAR); #Agrega 50 años a la fecha actual
SELECT DATE_ADD(NOW(),INTERVAL '10-5' YEAR_MONTH); #Agrega 10 años 5 meses a la fecha actual

/* <!--  

Restar tiempo en MySQL
Código : --> */

SELECT DATE_SUB(NOW(),INTERVAL 8 YEAR); #Resta 8 años a la fecha actual
SELECT DATE_SUB(NOW(),INTERVAL 24 HOUR); #Resta 24 horas a la fecha actual
SELECT DATE_SUB(NOW(),INTERVAL '7-2' YEAR_MONTH); #Resta 7 años dos meses a la fecha actual

/* <!-- Estos son algunos de los argumentos que podemos usar, para una lista completa consulten los manuales de MySql

Código : --> */

SECOND #Segundos
MINUTE #Minutos
HOUR #Horas
DAY #Días
MONTH #Meses
YEAR #Años
YEAR_MONTH #'Años-meses'
DAY_HOUR #'Días Horas'


/* <!-- 
Restar dos fechas

DATEDIFF(fecha_1,fecha_2) devuelve el número de días entre la fecha fecha_1 y la fecha_2

Código : --> */

SELECT DATEDIFF(NOW(),'2002-11-02'); #cuantos días han pasado
SELECT DATEDIFF(NOW(),'2020-03-20'); #Cuantos días faltan