<?php

namespace App\FrameworkTools\Implementations\Route;

use App\Controllers\HelloWorldController;
use App\Controllers\TrainQueryController;
<<<<<<< Updated upstream
use App\Controllers\ErnanidapazController;
=======
use App\Controllers\InsertCarController;
>>>>>>> Stashed changes

trait Get {
    
    private static function get() {
        switch (self::$processServerElements->getRoute()) {
                    
            case '/hello-world':
                return (new HelloWorldController)->execute();
            break;

            case '/train-query':
                return (new TrainQueryController)->execute();
            break;
<<<<<<< Updated upstream
                case '/paz1':
                return (new ErnanidapazController)->paz1();
            break;
=======

            case '/carro-select':
                return (new InsertCarControlle)->execute();
            break;


>>>>>>> Stashed changes
        }
    }

}