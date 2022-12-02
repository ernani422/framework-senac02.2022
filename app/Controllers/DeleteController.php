<?php

namespace App\FrameworkTools\Implementations\Route;

use App\Controllers\ErnanidapazController;
use App\Controllers\DeleteController;
trait Delete {
    
    private static function Delete() {
        switch (self::$processServerElements->getRoute()) {
                    
            case '/delete_user':
               return (new DeleteController)->exec();
            break;

            case '/paz4':
                return (new ErnanidapazController)->paz4();
             break;
        }
    }

}

/*Quanto mais voltas você dá para chegar ao destino final, menos resultado terá.
https://www.dinamize.com.br/blog/conversao/
https://institutopharos.com.br/2012/08/27/aprendizagem-organizacional-e-gestao-do-conhecimento/ (tacito e explicito)
https://imasters.com.br/gerencia-de-projetos-dev-e-ti/quatro-modos-de-conversao-conhecimento*/