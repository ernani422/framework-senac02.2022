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

            return array_map(function($element) {
                $nameAndValue = explode("=",$element);

                return [
                    "name"=>$nameAndValue[0],
                  "value"=>$nameAndValue[1]
                ];

            },$arrayWithVars
        );
            DD($varsOfUrl);

        }
        
    }
    