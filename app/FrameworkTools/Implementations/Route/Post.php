<?php

namespace App\FrameworkTools\Implementations\Route;

use App\Controllers\InsertCarController;
use App\Controllers\InsertDataController;
<<<<<<< Updated upstream
use App\Controllers\ErnanidapazController;
=======
>>>>>>> Stashed changes

trait Post {
    
    private static function post() {
        switch (self::$processServerElements->getRoute()) {
                    
            case '/carro-insert':
                return (new InsertCarController)->exec();
            break;
            case '/insert-data':
                return (new InsertDataController)->exec();  
            break;
<<<<<<< Updated upstream
                case '/carinsert':
                return (new InsertCarController)->exec();
            break;
                case '/paz2':
                return (new ErnanidapazController)->paz2();
            break;
=======
                
>>>>>>> Stashed changes


        }
    }

}
