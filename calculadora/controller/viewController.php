<?php
echo VIEWDEBUG?'cargado el viewController.php<br/>':'';
class ViewController{
    private $document;
    public $langController;

    public function __construct($langController){
        echo VIEWDEBUG?'creado el viewController<br/>':'';
        $this->document = '';
        $this->langController = $langController;
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
    
    public function append($string){
        $this->document = $this->document.$string;
    }


    private function cleanMarks(){
        $this->document = preg_replace("/{{::.*::}}/",'',$this->document); 
     }

    public function printDocument(){
        $this->cleanMarks();
        echo $this->document;
        $this->document = '';
    }

}


?>