<?php

class CalculadoraController {

    private function sanear ($numero){
        if(!is_numeric(str_replace(",", ".",$numero)) 
        &&!preg_match("/^[0-9]{1,}(\.[0-9]{1,})?$/", $numero)) {
            return false;
        }
        return $numero;
    }

    
    public function __construct(){

    }

    private function sumar($num1,$num2){
        return $num1+$num2;
    }
    private function restar($num1,$num2){
        return $num1-$num2;
    }
    private function multiplicar($num1,$num2){
        return $num1*$num2;
    }
    private function dividir($num1,$num2){
        return $num1/$num2;
    }

    public function calcula(){
        if (("POST" === $_SERVER["REQUEST_METHOD"]) 
        && isset($_REQUEST['calcula']) 
        && isset($_REQUEST['num1']) 
        && ($_REQUEST['num1']!='') 
        && isset($_REQUEST['num2']) 
        && ($_REQUEST['num2']!='')
        ){
            $num1 = $this->sanear($_REQUEST['num1']);
            $num2 = $this->sanear($_REQUEST['num2']);
            if ($num1!=false && $num2 != false) {
                switch ($_REQUEST['operacion']){
                    case 'suma':
                        echo CALCUDEBUG?'voy a sumar':'';
                        $result = $this->sumar($num1,$num2);
                        break;
                    case 'resta':
                        echo CALCUDEBUG?'voy a restar':'';
                        $result = $this->restar($num1,$num2);
                        break;
                    case 'multiplica':
                        echo CALCUDEBUG?'voy a multiplicar':'';
                        $result = $this->multiplicar($num1,$num2);
                        break;
                    case 'divide':
                        echo CALCUDEBUG?'voy a dividir':'';
                        $result = $this->dividir($num1,$num2);
                        break;
                    default:
                        echo 'ha ocurrido un error';
                        break;
                }
                return "<p>el resultado de su operacion es: $result</p>";
            }
        }
        return false;
    }
}

?>