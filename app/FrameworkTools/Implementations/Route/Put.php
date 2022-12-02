<?php

namespace App\FrameworkTools\Implementations\Route;

use App\Controllers\UpdateDataController;

use App\Controllers\ErnanidapazController;

trait Put {
/* para fazer update, consulte a url ou fazer insert*/
    private static function put() {
        switch (self::$processServerElements->getRoute()) {
            case '/update-data':
                return (new UpdateDataController)->exec();
            break;
            case '/paz3':
                return (new ErnanidapazController)->paz3();
            break;
        }
    }
}