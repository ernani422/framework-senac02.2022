<?php
    
    /*function dd($input){
        var_dump($input);
        die();
    }*/
    

    $mainPosition = __DIR__;

    require_once("{$mainPosition}\bootstrap\Env.php");
    require_once("{$mainPosition}\helper\helper.php");

    Env::execute();
    dd(env("DB_HOST"));

    