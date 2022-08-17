<?php

    namespace App\FrameworkTools\Implementations\FactoryMethods;

    
    trait BreakStringInVars {

        public function breakStringInVars ($requestUri){
            $uriAndVars = explode("?",$requestUri);

            if(!isset($uriAndVars[1])){
                return;
            }
            $stringWithVars = $uriAndVars[1];

            $arrayWithVars = explode("&", $stringWithVars);

            $varsOfUrl = array_map(function($element){
            return explode("=",$element);
            },$arrayWithVars
        );
            DD($varsOfUrl);

        }
        
    }
    