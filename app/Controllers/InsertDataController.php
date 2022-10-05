<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

use App\FrameworkTools\Database\DatabaseConnection;


class InsertDataController extends AbstractControllers{

    public function exec() {
        try{
        $pdo = DatabaseConnection::start()->getPDO();
        $params = $this->processServerElements->getInputJSONData();
        $response = ['sucess' => true ];
        $true =
        $query = "INSERT INTO user (name, last_name, age) VALUES (:name,:last_name,:age)";
        
        $statement = $pdo->prepare($query);

        if(!$params["name"])
            throw new \Exception("n pode aaaa");

        $statement->execute([
            ':name' => $params["name"],
            ':last_name' => $params["lastName"],
            ':age' => $params["age"]
        ]);



        view([
            'success'=> true
        ]);
    }catch(\Exception $e){
        view([
            'success'=> false,
            'message'=> $e->getMessage()
        ]);
    }
    }

}