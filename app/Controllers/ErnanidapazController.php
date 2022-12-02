<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

use App\FrameworkTools\Database\DatabaseConnection;

class ErnanidapazController extends AbstractControllers {
    //delete
    public function paz4() {
        $requestsVariables = $this->processServerElements->getVariables();
        $response = ['success' => true];

        $missingAttribute;
        $id_pet;
    
        try {
            
            foreach ($requestsVariables as $valueVariable) {
                if ($valueVariable["name"] === "id_pet") {
                    $id_pet = $valueVariable["value"];
                }
            }
            
            if (!$id_pet) {
                $missingAttribute = 'id_petIsNull';
                throw new \Exception("You need to inform id_pet variable");
            }

            $animal = $this
                        ->pdo
                        ->query("SELECT * FROM petshop WHERE id_petshop = '{$id_pet}';")
                        ->fetchAll();

            if (sizeof($animal) === 0) {
                $missingAttribute = 'thisid_petNoExist';
                throw new \Exception("There is not record of this id_pet in db");
            }
        
            $sql = "DELETE FROM petshop WHERE id_petshop= :id_pet";
            
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute(['id_pet' => $id_pet]);

        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'missingAttribute' => $missingAttribute
            ];
        }
        
        view($response);
    }

    //put
    public function paz3() {
            $id_pet;
            $missingAttribute;
            $response = [
                'success' => true
            ];
    
            try {
                $requestsVariables = $this->processServerElements->getVariables();
    
                if ((!$requestsVariables) || (sizeof($requestsVariables) === 0)) {
                    $missingAttribute = 'variableIsEmpty';
                    throw new \Exception("You need to insert variables in url");
                }
    
                foreach ($requestsVariables as $requestVariable) {
                    if ($requestVariable['name']  === 'id_pet') {
                        $id_pet = $requestVariable['value'];
                    }
                }
    
                if (!$id_pet) {
                    $missingAttribute = 'id_petIsNull';
                    throw new \Exception("You need to inform id_pet variable");
                }

                $animal = $this->pdo->query("SELECT * FROM petshop WHERE id_petshop = '{$id_pet}';")
                    ->fetchAll();
    
                if (sizeof($animal) === 0) {
                    $missingAttribute = 'thisid_petNoExist';
                    throw new \Exception("There is not record of this id_pet in db");
                }
    
                $params = $this->processServerElements->getInputJSONData();
    
                if ((!$params) || sizeof($params) === 0) {
                    $missingAttribute = 'paramsNotExist';
                    throw new \Exception("You have to inform the params attr to update");
                }
    
                $updateStructureQuery = '';
    
                $toStatement = [];
    
                foreach ($params as $key => $value) {
                    if (!in_array($key,['name_pet','type_service'])) {
                        $missingAttribute = "keyNotAcceptable";
                        throw new \Exception($key);
                    }
    
                    if ($key === 'name_pet') {
                        $updateStructureQuery .= "name_pet = :name_pet,";
                        $toStatement[':name_pet'] = $value;
                    }
    
                    if ($key === 'type_service') {
                        $updateStructureQuery .= " type_service = :type_service,";
                        $toStatement[':type_service'] = $value;
                    }

    
                }
                
                $newStringElementsSQL = substr($updateStructureQuery,0,-1);
    
                $sql = "UPDATE 
                            petshop 
                        SET
                            {$newStringElementsSQL}
                        WHERE
                            id_petshop = {$id_pet}
                        ";
                $statement = $this->pdo->prepare($sql);
    
                $statement->execute($toStatement);
    
                
            } catch (\Exception $e) {
                $response = [
                    'success' => false,
                    'message' => $e->getMessage(),
                    'missingAttribute' => $missingAttribute
                ];
            }
    
            view($response);
        }

    //post
    public function paz2() {
        try {
            $response = ['success'=> true];

            $this->params = $this->processServerElements->getInputJSONData();
    
    
            $query = "INSERT INTO petshop (name_pet,type_service) VALUES (:name_pet,:type_service)";
            
            $statement = $this->pdo->prepare($query);

            $statement->execute([
                ':name_pet' => $this->params["name_pet"],
                ':type_service' => $this->params["type_service"]
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
      

