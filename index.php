<?php
    
    /*function dd($input){
        var_dump($input);
        die();
    }*/
    

    $mainPosition = __DIR__;

    // use Bootstrap\Env; melhor do que ->require_once("{$mainPosition}\bootstrap\Env.php"); 
    require_once("{$mainPosition}\helper\helper.php");
    require_once("{$mainPosition}\\vendor\autoload.php");

    use bootstrap\Env;
    use App\frameworkTools\ProcessServerElements;

    
    Env::execute();
    $processServerElements = ProcessServerElements::start();
    dd($processServerElements);

    