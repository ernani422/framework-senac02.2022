<?php

namespace App\FrameworkTools\Implementations\FactoryMethods;

trait BreakStringInVars {

    public function breakStringInVars($requestUri) {
        $urlAndVars = explode("?",$requestUri);

        if (!isset($urlAndVars[1])) {
            return;
        }
    
        $stringWithVars = $urlAndVars[1];

        $arrayWithVars = explode("&",$stringWithVars);

        return array_map(function($element) { 
            $nameAndValue = explode("=",$element);

            return [
                "name" => $nameAndValue[0], 
                "value"  => $nameAndValue[1]
            ];
        },$arrayWithVars);

    }
}