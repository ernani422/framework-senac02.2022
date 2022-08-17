<?php

    namespace App\FrameworkTools\Implementations\FactoryMethods;

    use App\FrameworkTools\Abstracts\FactoryMethods\AbstractFactoryMethods;
    use App\FrameworkTools\ProcessServerElements;

    use App\FrameworkTools\Implementations\FactoryMethods\BreakStringInVars;

    class FactoryProcessServerElement extends AbstractFactoryMethods {

        use BreakStringInVars;

        Private $processServerElements;

        public function __construct (){
            $this->processServerElements = ProcessServerElements::start();
        }

        public function operation (){
           $this->processServerElements-> setdocumentRoot($_SERVER ["DOCUMENT_ROOT"]);
           $this->processServerElements-> setserverName($_SERVER ["SERVER_NAME"]);
           $this->processServerElements-> setserverName($_SERVER ["HTTP_HOST"]);
           $this->processServerElements-> setserverName($_SERVER ["REQUEST_URI"]);

           $this->breakStringInVars(['REQUEST_URI']);  
            dd($this->processServerElements);
        }
    }
?>