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
    use App\FrameworkTools\Implementations\FactoryMethods\FactoryProcessServerElement;

    
    Env::execute();

    $FactoryProcessServerElement = new FactoryProcessServerElement();
    $FactoryProcessServerElement->operation();

    ?>
    