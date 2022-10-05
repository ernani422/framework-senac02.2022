<?php

namespace App\Controllers;

use App\FrameworkTools\Abstracts\Controllers\AbstractControllers;

/* conexão com o banco /*/
use App\FrameworkTools\Database\DatabaseConnection;


class CarsController extends AbstractControllers{

    public function getCar() {
        $pdo = DatabaseConnection::start()->getPDO();

        $car = $pdo->query("SELECT * FROM car;")->fetchAll();

        view($car);
    }

    public function getidCar() {
        $pdo = DatabaseConnection::start()->getPDO();
        $id = null;
        foreach ($this->processServerElements->getVariables() as $variavel) {
            if($variavel["name"] == "idCar")
                $id =$variavel["value"];
        }
        $car = $pdo->query("SELECT * FROM car where id_car = ".$id." ;")->fetchAll();

        view($car);
    }

    public function getNameCar() {
        $pdo = DatabaseConnection::start()->getPDO();

        $nomeCar = null;
        foreach ($this->processServerElements->getVariables() as $variavel) {
            if($variavel["name"] == "nameCar")
                $nomeCar = $variavel["value"];
        }
        $car = $pdo->query("SELECT * FROM car where namecar ='{$nomeCar}';") ->fetchAll();

        view($car);
    }

    public function getSeller() { /*certo/*/
        $pdo = DatabaseConnection::start()->getPDO();

        $car = $pdo->query("SELECT * FROM vendedores;")->fetchAll();

        view($car);
    }

    public function getSellerId() {
        $pdo = DatabaseConnection::start()->getPDO();
        $id = null;
        foreach ($this->processServerElements->getVariables() as $variavel) {
            if($variavel["name"] == "idSellerr")
                $id =$variavel["value"];
        }

        $car = $pdo->query("SELECT * FROM vendedores where id_vendedor = '{$id}';")->fetchAll();

        view($car);
    }

    public function getSellerName() {
        $pdo = DatabaseConnection::start()->getPDO();
        $name = null;
        foreach ($this->processServerElements->getVariables() as $variavel) {
            if($variavel["name"] == "nameSeller")
                $name =$variavel["value"];
        }

        $car = $pdo->query("SELECT * FROM vendedores where nameVend  = '{$name}' ;")->fetchAll();

        view($car);
    }

/*
    public function getBuyer() {
        $pdo = DatabaseConnection::start()->getPDO();
       

        $car = $pdo->query("SELECT * FROM vendedores where nameVend  = '{$name}' ;")->fetchAll();

        view($car);
    }
*/


    public function getBuyer() {
        $pdo = DatabaseConnection::start()->getPDO();
       

        $car = $pdo->query("SELECT * FROM compradores;")->fetchAll();

        view($car);
    }

    public function getBuyersById() {
        $pdo = DatabaseConnection::start()->getPDO();
        $id = null;
        foreach ($this->processServerElements->getVariables() as $variavel) {
            if($variavel["name"] == "idBuyer")
                $id =$variavel["value"];
        }

        $car = $pdo->query("SELECT * FROM vendedores where id_vendedor = '{$id}';")->fetchAll();

        view($car);
    }


    public function getNameBuyer() {
        $pdo = DatabaseConnection::start()->getPDO();
        $name = null;
        foreach ($this->processServerElements->getVariables() as $variavel) {
            if($variavel["name"] == "nameBuyer")
                $name =$variavel["value"];
        }

        $car = $pdo->query("SELECT * FROM vendedores where nameVend  = '{$name}' ;")->fetchAll();

        view($car);
    }

    
    public function getCarsByBuyerName() {
        $pdo = DatabaseConnection::start()->getPDO();
        $name = null;
        foreach ($this->processServerElements->getVariables() as $variavel) {
            if($variavel["name"] == "nameBuyer")
                $name =$variavel["value"];
        }

        $car = $pdo->query
                        ("SELECT 
                                car.namecar,
                                car.modelo
                                        FROM 
                                            car 
                                              inner join vendas on vendas.id_car = car.id_car;
                                              inner join 
                                                compradores 
                                                  where vendas.id_comprador = compradores.id_comprador 
                                                  where nameBuyer = compradores.nameComprador '{$name}' ;")->fetchAll();

        view($car);
    }



}
