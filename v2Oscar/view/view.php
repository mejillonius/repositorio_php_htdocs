<?php

// quan el registre no és correcte crida a la funció  _vista_form_registro() indicant-li el valor dels camps incorrectes i en quin idioma ho ha de mostrar, per això envia el valor false per que la funció sàpiga que ha de mostrar un missatge d'error

function vistaRegistroIncorrecto($usuario, $email, $lang_form)
{
      _vista_form_registro($usuario, $email, false, $lang_form);
}

// quan el registre encara no s'ha intentat, per tant és el primer cop que es carrega el formulari, crida a la funció  _vista_form_registro() indicant-li que no té cap valor als camps del formulari i en quin idioma ho ha de mostrar, per això envia el valor true per que la funció sàpiga que és el primer cop que es carrega aquesta funció i per tant no ha de mostrar cap missatge d'error

function vistaMostrarFormularioRegistro($lang_form)
{
      _vista_form_registro("", "", true, $lang_form);
}

// prepara la vista_ok (feedback) i la enviarà a muntar a la funció monta_views indicant quin tpl farà servir
// munta quins paràmatres li venen des del formulari i el resultat de la consulta a la BBDD amb tots els camps introduïts i els guarda en una variable de sessió per si es canvi d'idioma a la vista feedback conservar-los al recarregar l'aplicació
// un cop fet això li suma als paràmetres els paràmetres de l'idioma
// envia els paràmetres i quin tpl vol muntar a la vista a la funció monta_views

function vistaRegistroCompletado($usuario, $email, $rows, $lang_feedback)
{

      $div = "";

      if (!empty($rows)) {

            // mostra el llistat de tots els camps de la BBDD
            // crea una taula i posa a cada fil.la el contingut d'un registre

            foreach ($rows as $key => $row) {
                  $div .= "<tr><td>" . $row['id'] . "</td><td>" . $row['usuario'] . "</td><td>" . $row['email'] . "</td></tr>";
            }

            $div .= "</table>";
      }

      $params = [
            "usuario" => $usuario,
            "email" => $email,
            "div" => $div,
      ];

      $_SESSION['params'] = $params;

      $params = array_merge($params, $lang_feedback);

      montaViews($params, "../view/tpls/vista_ok.tpl");
}

// gestiona la vista del formulari de registro
// comprova si és el primer cop que s'executa, i si no és així vol dir que hi ha hagut un error i crea el missatge d'error a partir de l'idioma que li arriba a la funció com a paràmetre.
// passa els valors que ens hagin arribat a la funció des del formulari a la funció que monta la vista monta_views
// per passar els paràmetres a la funció monta_views suma els valors del formulari i els valors de presentació del idioma triat
// li diu a la funció monta_views quin tpl ha de fer servir per muntar la vista formulari
// si no es el primer cop i té un error el guarda a una variable de sessió per si l'usuari canvi d'idioma conservar el missatge

function _vista_form_registro($usuario, $email, $primera_vez, $lang_form)
{
      $div = "";
      $class_error = "";
      $mensaje_error = "";

      if (!$primera_vez) {
            $class_error = "error";
            $mensaje_error = "<div class=\"w3-panel w3-padding w3-round w3-red\">" . $lang_form['missatge_error'] . "</div>";
      }

      $params = [
            "usuario" => $usuario,
            "email" => $email,
            "class_error" => $class_error,
            "mensaje_error" => $mensaje_error,
      ];

      $params = array_merge($params, $lang_form);

      montaViews($params, "../view/tpls/vista_form.tpl");
      $div = "</div>";
}

// munta i mostra les vistes a partir de les dades que rep la funció
// primer munta un html a partir del fitxer que li hem passat com a paràmetre
// substitueix en aquest html les variables de substitució pels valors que li arribem dintre de l'array $params
// ho mostra per pantalla amb un echo

function montaViews($params, $archivo)
{
      $html = file_get_contents($archivo);
      foreach ($params as $key => $value) {

            $html = str_replace("{{#$key#}}", $value, $html);
      }

      echo $html;
}
