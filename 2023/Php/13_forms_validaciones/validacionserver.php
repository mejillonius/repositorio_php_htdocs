<?php

function sanitize($data)
{
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
}

$error = "";
$exito = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

      $email = isset($_REQUEST['email']) ? $_REQUEST['email'] : "";
      $asunto = isset($_REQUEST['asunto']) ? $_REQUEST['asunto'] : "";
      $contenido = isset($_REQUEST['contenido']) ? $_REQUEST['contenido'] : "";

      if (empty($email)) {
            $error .= "Email es un campo obligatorio. <br/>";
      } else if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
            $error .= "Correo electrónico no válido.<br/>";
      } else {
            $email = sanitize($email);
      }


      if (empty($asunto)) {
            $error .= "Asunto es u]n campo obligatorio. <br/>";
            //!is_string($asunto) 
            //filter_var($asunto,FILTER_SANITIZE_STRING)===false
      } else if (strlen($asunto) < 2 || strlen($asunto) > 40) {
            $error .= "Asunto no se ajusta al largo necesario.<br/>";
      } else {
            $asunto = sanitize($asunto);
      }

      if (empty($contenido)) {
            $error .= "Nos interesa el contenido de tu mensaje y es un campo obligatorio. <br/>";
      } else if (strlen($contenido) < 10 || strlen($contenido) > 200) {
            $error .= "Ajusta tu mensaje a un máximo de 200 carácteres.<br/>";
      } else {
            $contenido = sanitize($contenido);
      }

      if ($error != "") {
            $error = '<div class="alert alert-danger" role="alert">TENEMOS ERRORES EN NUESTRO FORMULARIO!<br/>' . $error . '</div>';
      } else {
            $to       = "tucorreo@tudominio.com";
            $headers  = 'MIME-Version: 1.0' . "\r\n" .
                  'Content-type: text/html; charset=utf-8' . "\r\n" .
                  'From: Consulta enviada desde nuestra web por' . $email . "\r\n" .
                  'Reply-To: ' . $email . "\r\n";
            /*        $headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
        $headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";*/

            $emilio = mail($to, $asunto, $contenido, $headers);
            if ($emilio) {
                  $exito = '<div class="success alert-success" role="">Correo enviado CORRECTAMENTE!<br/></div>';
            } else {
                  $error = '<div class="alert alert-danger" role="alert">NO HEMOS PODIDO ENVIAR EL CORREO!<br/></div>';
            }
      }
}
