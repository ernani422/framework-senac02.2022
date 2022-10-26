<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

use App\FrameworkTools\Database\DatabaseConnection;

class ErnanidapazController extends AbstractControllers {
//post
    public function paz2() {
        try {
            $response = ['success'=> true];

            $this->params = $this->processServerElements->getInputJSONData();
    
    
            $query = "INSERT INTO petshop (name_pet,type_service) VALUES (:name_pet,:type_service)";
            
            $statement = $this->pdo->prepare($query);

            $statement->execute([
                ':name_pet' => $this->params["nome_animal"],
                ':type_service' => $this->params["servicopet"]
            ]);

        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'missingAttribute' => $this->attrName
            ];
        }

        view($response);
    }

    

//get
    public function paz1() {

        $databaseConnection = DatabaseConnection::start()->getPDO();

        $animal = $databaseConnection
                ->query("SELECT * FROM petshop")
                ->fetchAll();

        view($animal);
    }

}
      


