<?php

namespace App\FrameworkTools\Implementations\Route;

use App\Controllers\DeleteController;
trait Delete {
    
    private static function Delete() {
        switch (self::$processServerElements->getRoute()) {
                    
            case '/delete_user':
               return (new DeleteController)->exec();
            break;
        }
    }

}