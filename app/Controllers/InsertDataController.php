<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

class InsertDataController extends AbstractControllers{

    private $params;
    private $attrName;
    
    public function exec() {
        try {
            $response = ['success'=> true];

            $this->params = $this->processServerElements->getInputJSONData();
    
            $this->verificationInputVar();
    
            $query = "INSERT INTO frameworksenac (name,last_name,age) VALUES (:name,:last_name,:age)";
            
            $statement = $this->pdo->prepare($query);     
            $statement->execute([
                ':name' => $this->params["nameL"],
                ':last_name' => $this->params["lastname"],
                ':age' => $this->params["age"]
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


    private function verificationInputVar() {
        if (!$this->params['name']) {
            $this->attrName = 'name';
            throw new \Exception('the name has to be send in the request');
        }   

        if (!$this->params['lastname']) {
            $this->attrName = 'last_name';
            throw new \Exception('the last_name has to be send in the request');
        }

        if (!$this->params['age']) {
            $this->attrName = 'age';
            throw new \Exception('the age has to be send in the request');
        }

    }

}
