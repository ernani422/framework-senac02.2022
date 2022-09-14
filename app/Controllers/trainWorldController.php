<?php
    
    namespace App\Controllers;

    use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

    class HelloWorldController extends AbstractControllers {

        public function execute(){
            $requestsVariables = $this -> processServerElements -> getVariables();
            $valueOfVariable;

            foreach($requestsVariables as $value){
                if($value["name"] == "info"){
                    $valueOfVariable = $value["value"];                
                }
            }
        
            view([
                "name" => "Api to Learning",
                "version" => 1.0,
                "value_of_variable_info" => $valueOfVariable,
                "manager_developer" => "ernani",
                "web_site_company" => "https://jms.com"
            ]);
        }
    }
