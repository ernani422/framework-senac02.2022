<?php

    namespace app\frameworkTools;

        class ProcessServerElements{

            private static $instance;

            private function __construct(){
                // SINGLETON
            }
            
        public  static  function start(){ // design patter
            if(!ProcessServerElements::$instance){
                ProcessServerElements::$instance = new
                ProcessServerElements();
            }

            return ProcessServerElements::$instance;
        }
    }