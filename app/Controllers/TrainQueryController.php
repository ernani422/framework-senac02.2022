<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

use App\FrameworkTools\Database\DatabaseConnection;

class TrainQueryController extends AbstractControllers{

    public function execute() {
        $requestsVariables = $this->processServerElements->getVariables();
        $valueOfVariable;
        
        foreach ($requestsVariables as $value) {
            if($value["name"] == "name") {
                $valueOfVariable = $value["value"];
            }
        }

        $databaseConnection = DatabaseConnection::start()->getPDO();

        $users = $databaseConnection
                ->query("SELECT * FROM user WHERE name = '{$valueOfVariable}';")
                ->fetchAll();

        view($users);
    }

}
