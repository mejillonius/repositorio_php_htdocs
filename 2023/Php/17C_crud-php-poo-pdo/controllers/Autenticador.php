<?PHP

class Autenticador{

    static public function iniciarSesion(){

        if($_SESSION['rol'] == 1){
            require_once('views/tpls/inicio.php');
        } else if ($_SESSION['rol'] == 2){
            require_once('views/tpls/inicio_editor.php');
        }else if ($_SESSION['rol'] == 3){
            require_once('views/tpls/inicio_externo.php');
        }
    }

    static public function cerrarSesion(){
        session_destroy();
    }
}