<?php

namespace App\FrameworkTools\Implementations\Route;

use App\Controllers\InsertCarController;
use App\Controllers\InsertDataController;
use App\Controllers\InsertCarController;

trait Post {
    
    private static function post() {
        switch (self::$processServerElements->getRoute()) {
                    
            case '/carro-insert':
                return (new InsertCarController)->exec();
            break;
            case '/insert-data':
                return (new InsertDataController)->exec();  
            break;
                case '/carro-insert':
                return (new InsertCarController)->exec();
            break;


        }
    }

}
