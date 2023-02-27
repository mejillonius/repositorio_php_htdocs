<?php

//ens connectem a la BBDD tal com està definit al fitxer connection.php

require_once "../model/connection.php";

// rebrem 3 paràmetres, l'usuari $usuario i email $email introduïts al form i també la connexió a la BBDD $con

function modeloRegistrarNuevoUsuario($usuario, $email, $con)
{

    //comprova si hi ha dades a $usuario i $email, si no hi han fa fora del servidor i retorna un valor de fals a qui ha cridat a la funció

    if (empty($usuario) || empty($email)) {
        return false;
    }

    $myrows = [];

    // a la variable $selectQuery creem una cadena amb el codi de una consulta SQL on SELECIONA tots els camps on usuario=$usuario o email=$email o sigui que hi hagi un usuari o email a la BBDD als camps usuario o email que coincideixi amb el que ens han introduït al form

    $selectQuery = "SELECT * FROM usuarios WHERE usuario='$usuario' OR email='$email'";

    // a la variable $rs guardem el resultat de la consulta, on fent servir la connexió ($con) executa la consulta query (buscar) amb els paràmetres que hem guardat a la variable $selectQuery

    $rs = $con->query($selectQuery);

    // comprobem si a la variable $rs hi ha alguna fila, si s'ha creat alguna fila voldria dir que hi ha alguna coincidencia entre el usuario o mail introduït al form amb algun camp de la BBDD

    if ($rs->num_rows > 0) {

        // si existeix alguna coincidència ens fa sortir y guarda el valor user exists

        return ["user_exists", false];

    }

    // si no existeix cap coincidència inserta a la BBDD usuarios als camps usuario i email els valors de les variables $usuario i $email
    // creem una variable amb els criteris SQL per fer la inserció

    $insertQuery = "INSERT INTO usuarios (usuario, email) VALUES ('$usuario', '$email')";

    // executem a través de la connexió $con una query que  fa la inserció de les dades que es defineixen a $insertQuery i ho guardem a la variable $rs
    // es podria fer sense enmagatzemar a variable fent només $con->query($insertQuery);

    $rs = $con->query($insertQuery);

    // si existeix un resultat a mostrar:

    if ($rs) {

        // recolllim totes les dades de la BBDD

        // creamos la consulta para seleccionar todos los campos de la BBDD usuarios y  guarda los parámetros en $allRowsQuery

        $allRowsQuery = "SELECT * FROM usuarios";

        // la consulta mira todos los campos de la BBDD usuarios y lo guarda en $result

        $result = $con->query($allRowsQuery);

        //

        while ($rows = $result->fetch_assoc()) {

            // guada en un array los valores de las filas de la BBDD
            $myrows[] = $rows;

        }

    } else {

        // com no s'ha creat una variable $rs vol dir que no hi ha resultat de connexió per tant no s'ha pogut fer la inserció

        return ["insert_not_ok", false];
    }

    // tanca la connexió amb la BBDD

    $con->close();

    // com a resultat de la funció retorna dos valors, el de les dades de totes les files i un valor true

    $finalValue = [$myrows, true];

    return $finalValue;

}
