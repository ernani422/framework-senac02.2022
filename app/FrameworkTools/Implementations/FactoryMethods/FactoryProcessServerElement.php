<?php

    namespace App\FrameworkTools\Implementations\FactoryMethods;

    use App\FrameworkTools\Abstracts\FactoryMethods\AbstractFactoryMethods;
    use App\FrameworkTools\ProcessServerElements;

    class FactoryProcessServerElement extends AbstractFactoryMethods {
        Private $processServerElements;

        public function __construct (){
            $this->processServerElements = ProcessServerElements::start();
        }

        public function operation (){
           $this->processServerElements-> setdocumentRoot($_SERVER ["DOCUMENT_ROOT"]);
           $this->processServerElements-> setserverName($_SERVER ["SERVER_NAME"]);
             // vamos fazer mais codigo aqui
            dd($this->processServerElements);
        }
    }
?>