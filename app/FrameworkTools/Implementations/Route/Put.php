<?php

namespace App\FrameworkTools\Implementations\Route;

use App\Controllers\UpdateDataController;

trait Put {
/* para fazer update, consulte a url ou fazer insert*/
    private static function put() {
        switch (self::$processServerElements->getRoute()) {
            case '/update-data':
                return (new UpdateDataController)->exec();
            break;
        }
    }
}