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
    
            $query = "INSERT INTO car (carName,model) VALUES (:carName,:model)";
            
            $statement = $this->pdo->prepare($query);

            $statement->execute([
                ':carName' => $this->params["nomeCarro"],
                ':model' => $this->params["modelo"]
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
        if (!$this->params['nomeCarro']) {
            $this->attrName = 'carName';
            throw new \Exception('the name has to be send in the request');
        }   

        if (!$this->params['modelo']) {
            $this->attrName = 'model';
            throw new \Exception('the last_name has to be send in the request');
        }
    }

}
