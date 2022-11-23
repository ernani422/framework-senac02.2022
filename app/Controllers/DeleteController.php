<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

class DeleteController extends AbstractControllers {

    public function exec() {
        $requestsVariables = $this->processServerElements->getVariables();

        $idUser;
        dd($requestsVariables);
        foreach ($requestsVariables as $valueVariable) {
            if ($valueVariable['name']  === 'id_user') {
                $idUser = $valueVariable['value'];
            }
        }

        dd($idUser);
    }
}
/*Quanto mais voltas você dá para chegar ao destino final, menos resultado terá.
https://www.dinamize.com.br/blog/conversao/
https://institutopharos.com.br/2012/08/27/aprendizagem-organizacional-e-gestao-do-conhecimento/ (tacito e explicito)
https://imasters.com.br/gerencia-de-projetos-dev-e-ti/quatro-modos-de-conversao-conhecimento*/