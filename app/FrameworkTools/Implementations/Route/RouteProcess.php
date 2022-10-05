<?php

namespace App\FrameworkTools\Implementations\Route;

use App\FrameworkTools\ProcessServerElements;
use App\Controllers\CarsController;
use App\Controllers\InsertDataController;


class RouteProcess {

    public static function execute() {
        $processServerElements = ProcessServerElements::start();
        $routeArray = [];
    
        switch($processServerElements->getVerb()) {
            case 'GET':

                switch ($processServerElements->getRoute()) {

                    case '/car':
                        return (new CarsController)->getCar();
                    break;
                case '/car/id-by-car':
                    return (new CarsController)->getidCar(); 
                    break;

                case '/car/name-by-car':
                    return (new CarsController)->getNameCar();
                    break;

                case '/seller':
                    return (new CarsController)->getSeller();
                    break;

                case '/seller/id-by-seller':
                    return (new CarsController)->getSellerId();
                    break;

                case '/seller/name-by-seller':
                    return (new CarsController)->getSellerName(); /**/ 
                    break;
/*
                case '/seller/get-all-car-by-seller':
                    return (new CarsController)->getSellByName();
                    break;
*/
                case '/Buyer':
                    return (new CarsController)->getBuyer();
                    break;

                case '/buyer/id-by-buyer':
                    return (new CarsController)->getBuyersById();
                    break;
                
                case '/buyer/name-by-buyer':
                    return (new CarsController)->getNameBuyer();
                    break;
                    
                case '/buyer/get-all-cars':
                    return (new CarsController)->getCarsByBuyerName();
                    break;

            
            }
            case 'POST':
            
                switch ($processServerElements->getRoute()) {
                    case '/insert-data':
                        return (new InsertDataController)->exec();
                    break;
                }
                
        }
        

    }

}