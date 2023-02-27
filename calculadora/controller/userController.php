<?php

class UserController{

    private $model;
    private $langController;
    private $document='';
    public function __construct($langController) {
        require_once(MODEL.'myModel.php');
        $this->model = new Model();
        $this->langController = $langController;
    }

    function sanitize($data)
    {
          $data =  trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
    }
    public function construirForm(){
        $this->document = $this->construir('bodyregister');

        if(isset($_POST['user'])&& isset($_POST['mail'])){
            $luser = $this->sanitize($_POST['user']);
            $mail = $this->sanitize($_POST['mail']);
            $params = array('uservalue' => $luser, 'mailvalue' => $mail, 'foo' => "he recibido por post el usuario $luser y el email $mail");
            $this->document = $this->construir($this->document,$params);
        };
    }

    public function construirFeedback(){
/*         <h2>{{::hetitulo::}}</h2>
        {{::tablausuarios::}}
        <h3>{{::gracias::}} {{::usuario::}}</h3>
        <p>{{::feedbackmail::}} {{::mail::}}</p> */

        $this->document = $this->construir('bodyfeedback');
        $regusuario = $_REQUEST['user'];
        $regemail = $_REQUEST['mail'];
        $arrayUsuarios = $this->model->getUsuarios();
        $div = '';

        foreach ($arrayUsuarios as $value){
            $id = $value['id'];
            $usuario = $value['usuario'];
            $mail = $value['email'];
            $div = $div."<tr><td>$id</td><td>$usuario</td><td>$mail</td></tr>";
        }
        $params = array(
            'regluser' => $regusuario,
            'regmeil' => $regemail,
            'tablausuarios' => $div
        );
        $this->document = $this->construir($this->document, $params);
    }

    public function construir ($documento,$strings = null){
        echo VIEWDEBUG? 'funcion construir':'';

        if ($strings == null){
            $strings = $this->langController->getLangStrings($documento);
            $documento = file_get_contents(VIEWS.$documento.'.tpl');
        }
        
        foreach ($strings as $key => $value){
            $documento = str_replace("{{::$key::}}",$value,$documento);
        }
        return $documento;
    }
    
    public function getBody(){
        if (("POST" === $_SERVER["REQUEST_METHOD"]) && isset($_REQUEST['registrar'])
        &&!$this->model->usuarioexists($_REQUEST['user'])
        &&!$this->model->mailexists($_REQUEST['mail'])){
            if($this->model->insertar($_REQUEST['user'],$_REQUEST['mail'])){
                $this->construirFeedback();
            }else{
            $document = 'ha ocurrido un error, vuelvalo a intentar, mas tarde';
            }
        } else {
            $this->construirForm();
        }
        $copia = $this->document;
        $this->document = '';
        return $copia;
    }
}

?>