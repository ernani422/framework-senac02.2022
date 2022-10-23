<?php

namespace App\FrameworkTools\Implementations\Route;

use App\Controllers\InsertCarController;
use App\Controllers\InsertDataController;


trait Post {
    
    private static function post() {
        switch (self::$processServerElements->getRoute()) {
            case '/insert-data':
                return (new InsertDataController)->exec();  
            break;
                case '/carro-insert':
                return (new InsertCarController)->exec();
            break;


        }
    }

}
