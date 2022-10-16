<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

class InsertCarController extends AbstractControllers{

    private $params;
    private $attrName;
    
    public function exec() {
        try {
            $response = ['success'=> true];

            $this->params = $this->processServerElements->getInputJSONData();
    
            $this->verificationInputVar();
    
            $query = "INSERT INTO car (namecar,modelo,ano) VALUES (:name,:modelo,:ano)";
            
            $statement = $this->pdo->prepare($query);     

            $statement->execute([
                ':namecar' => $this->params["namecar"],
                ':modelo' => $this->params["modelo"],
                ':ano' => $this->params["ano"]
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
        if (!$this->params['namecar']) {
            $this->attrName = 'namecar';
            throw new \Exception('the name has to be send in the request');
        }   

        if (!$this->params['modelo']) {
            $this->attrName = 'modelo';
            throw new \Exception('the modelo has to be send in the request');
        }

        if (!$this->params['ano']) {
            $this->attrName = 'ano';
            throw new \Exception('the ano has to be send in the request');
        }

    }

}