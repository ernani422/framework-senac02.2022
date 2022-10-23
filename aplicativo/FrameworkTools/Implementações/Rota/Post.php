<?php
/* Esse arquivo está correto, porém esta no caminho e pasta errada, pfv retorne clicando no framework-senac02.2022 
e verifique as pastas abaixo que está com os caminhos corretos*/

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
