<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

class UpdateDataController extends AbstractControllers {

    public function exec() {
        $userId;
        $missingAttribute;
        $response = [
            'success' => true
        ];

        try {
            $requestsVariables = $this->processServerElements->getVariables();/* do url */

            if ((!$requestsVariables) || (sizeof($requestsVariables) === 0)) {/* se for*/
                $missingAttribute = 'variableIsEmpty';
                throw new \Exception("You need to insert variables in url");
            }

            

            foreach ($requestsVariables as $requestVariable) {/* se ele encontrar*/
                if ($requestVariable['name']  === 'userId') {
                    $userId = $requestVariable['value'];
                }
            }

            if (!$userId) {/* se nao exitrir*/
                $missingAttribute = 'userIdIsNull';
                throw new \Exception("You need to inform userId variable");
            }

            $users = $this->pdo->query("SELECT * FROM user WHERE id_user = '{$userId}';")/* pdo chama o met query e um select no banco de dados vai retonar todos*/
                ->fetchAll();

            if (sizeof($users) === 0) {/* vai inserir em tdos*/
                $missingAttribute = 'thisUserNoExist';
                throw new \Exception("There is not record of this user in db");
            }

            $params = $this->processServerElements->getInputJSONData();

            dd($params);

            if ((!$params)|| sizeof($params) === 0) {/* vai inserir em tdos*/
                $missingAttribute = 'paramsNotExist';
                throw new \Exception("You have to inform thr params attr to update");
            }
            $updateStructureQuery = '';

            foreach($params as $key => $value){/* vai inserir em tdos*/
                if(!in_array($key,['name','last_name','age'])){
                    $missingAttribute = "keyNotAcceptable";
                    throw new \Exception ($key);
                
                
            }

            if($key === 'name'){
                $updateStructureQuery.="name =:name,";
            }

            if($key === 'last_name'){
                $updateStructureQuery.="last_name =:last_name,";
            }
            
            if($key === 'age'){
                $updateStructureQuery.="age =:age,";
            }
        }
        $updateStringInArray = str_split($updateStructureQuery);

        array_pop($updateStringInArray);

        $newStringElementsSQL = implode($updateStringInAray);

        $sql = "UPDATE
                        user
                SET
                {$newStrutureElementsSQL}
                    where
                        id_user =:id_user";
    dd($sql);
    $statement = $this->pdo->prepare($sql);
            
        } catch (\Exception $e) {
            $response = [
                'success' => false,
                'message' => $e->getMessage(),
                'missingAttribute' => $missingAttribute
            ];
        }

        view($response);
    }
}