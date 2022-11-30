<?php

namespace App\FrameworkTools\Implementations\Route;

use App\Controllers\InsertCarController;
use App\Controllers\InsertDataController;
use App\Controllers\ErnanidapazController;



trait Post {
    
    private static function post() {
        switch (self::$processServerElements->getRoute()) {
                    
            case '/carro-insert':
                return (new InsertCarController)->exec();
            break;
            case '/insert-data':
                return (new InsertDataController)->exec();  
            break;

                case '/car-insert':
                return (new InsertCarController)->exec();
            break;
                case '/paz2':
                return (new ErnanidapazController)->paz2();
            break;
        }
    }

}
