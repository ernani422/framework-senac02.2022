<?php
    
    /*function dd($input){
        var_dump($input);
        die();
    }*/
    

    $mainPosition = __DIR__;

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: *");

    // use Bootstrap\Env; melhor do que ->require_once("{$mainPosition}\bootstrap\Env.php"); 
    require_once("{$mainPosition}\helper\helper.php");
    require_once("{$mainPosition}\\vendor\autoload.php");

    use bootstrap\Env;
    use App\FrameworkTools\Implementations\FactoryMethods\FactoryProcessServerElement;
    use App\FrameworkTools\Implementations\Route\RouteProcess;

    
    Env::execute();

    $factoryProcessServerElement = new FactoryProcessServerElement();
    $factoryProcessServerElement->operation();

    RouteProcess::execute();

    ?>
    