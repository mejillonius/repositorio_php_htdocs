<?php

class MainController {

    private $langController;
    private $config;
    private $viewController;
    private $userController;

    

    public function __construct () {
        require_once('./controller/config.php');
        $this->config = new Config();
        require_once(CONTROLLERS.'langController.php');
        $this->langController = new LangController();
        echo MAINDEBUG?'el idioma seleccionado es '.$this->langController->getLang().' <br/>':'';
        require_once(CONTROLLERS.'viewController.php');
        $this->viewController = new ViewController($this->langController);
        require_once(CONTROLLERS.'userController.php');
        $this->userController = new UserCOntroller($this->langController);

    }



    


    public function start() {
        echo MAINDEBUG?"esto tira<br/>":'';
        MAINDEBUG?var_dump($_REQUEST):null;
        


        
        $header = $this->viewController->construir('header');
        $this->viewController->append($header);


      
        //$this->userController->construirForm();
        $body = $this->userController->getBody();
        $this->viewController->append($body);


/*         $body = $this->viewController->construir('bodyregister');

        if(isset($_POST['user'])&& isset($_POST['mail'])){
            $luser = $this->sanitize($_POST['user']);
            $mail = $this->sanitize($_POST['mail']);
            $params = array('uservalue' => $luser, 'mailvalue' => $mail, 'foo' => "he recibido por post el usuario $luser y el email $mail");
            $body = $this->viewController->construir($body,$params);
        };

        //$body = $this->viewController->construir($body,array('uservalue' => 'perico'));
        $this->viewController->append($body); */

        

        $footer = $this->viewController->construir('footer');
        $this->viewController->append($footer);

        $this->viewController->printDocument();

 
    }
}

?>