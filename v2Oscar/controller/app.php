<?php

// monta el fitxer idioma que és el que controla que existeixi una sessió d'usuari i l'idioma triat en cada moment

/*require_once "../model/idioma.php";*/

// aquí carrega la connexió amb la BBDD i crea la funció que comproba que el valor del form no existeix ja a la BBDD
require_once "../view/idioma.php";

require_once "../model/model.php";

// aquí es creen les funcions que generen el que veurà l'usuari, les vistes

require_once "../view/view.php";
require_once "../view/canvi.php";

// controla que a la vista_ok (feedback) s'hagi fet un canvi d'idioma, i si és així recarrega amb el nou idioma la vista feedback

/*require_once "../model/canvi_idioma.php";*/

// funció que saneja el valor que ens arriba des del formulari per evitar codi maliciós

function sanitize($data)
{
    trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// funció
// comproba que ens hagin arribat arribat dades a través del mètode POST
// recull la informació que ens arriba del formulari i la guarda en variables i després saneja les variables per evitar codi maliciós

function actionNuevoUsuario($con, $lang_form, $lang_feedback)
{
    if (("POST" === $_SERVER["REQUEST_METHOD"]) && isset($_REQUEST['registrar'])) {

        $usuario = isset($_REQUEST['usuario']) ? $_REQUEST['usuario'] : "";
        $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";

        $usuario = sanitize($usuario);
        $email = sanitize($email);

// rebem dos valors, per una banda un array $params amb totes les dades de la BBDD y un true o false ($ok) que ens indica si ha pogut guardar el registre a la BBDD (true) o bé si no s'ha introduït usuari/mail o bé si ja estaba a la BBDD (false)

        list($param, $ok) = modeloRegistrarNuevoUsuario($usuario, $email, $con);

        if ($ok) {

//Si ens torna un true vol dir que l'usuari no existeix a la BBDD i l'ha registrat correctament, aleshores envia la vista_registro_completado() els valors que hem introduït al formulari, el contingut de la BBDD a $params i el idioma en que ha muntar la pàgina (per que ho mostri en el feedback) i atura l'execució de la resta

            vistaRegistroCompletado($usuario, $email, $param, $lang_feedback);
            exit;
        }
// Si ens arriba un false vol dir que o no existeix usuari/mail o bé que ja estaba registrat a la BBDD, en aquest cas envia les dades introduïdes al formulari i l'idioma a vista_registro_incorrecto() per que ens mostri un missatge d'error

        else {
            vistaRegistroIncorrecto($usuario, $email, $lang_form);
            exit;
        }
    }

}

// si no existeix un submit amb el camp 'action' ompklert vol dir que no s'ha fet submit al formulari, per tant és el primer cop que s'executa, aleshores carrega la vista del formulari on només li passa com a paràmetre l'idioma en que l'ha de mostrar i atura l'execució del programa

if (!isset($_REQUEST["action"])) {
    vistaMostrarFormularioRegistro($lang_form);
    exit;
}

// si no s'ha aturat l'execució del programa a les línies anteriors vol dir que sí que existeix un submit, per tant s'han introduït dades al formulari
// mirem el valor de 'action' (que en aquest programa només te un valor) i cridem a una funció que té el nom compost per 'action_'+ el valor que ens arribi del camp 'action'
// per cridar-la fem servir el mètode  call_user_func() on el primer paràmetre és el nom de la funció i la resta son els paràmetres que li passem
// en aquest cas li passem el nom de la funció, l'estat de la connexió que hem aconseguit a connection.php a partir de model.php i l'idioma a carregar (en aquest cas com per cada idioma tenim dos arrays, un per cada pàgina (form i feedback) li passem dos)
// crida a la funció que es la que controlarà si existeix registre o no, el motiu si no hi ha registre i la presentació del feedback si s'ha fet correctament

$action = "action" . $_REQUEST["action"];
$ejecuta = call_user_func($action, $con, $lang_form, $lang_feedback);

if (!$ejecuta) {
    vistaMostrarFormularioRegistro($lang_form);
}
