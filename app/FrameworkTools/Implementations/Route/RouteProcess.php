<?php

namespace app\FrameworkTools\Implementations\Route;

use App\FrameworkTools\ProcessServerElements;
use App\Controllers\HelloWorldController;

class RouteProcess{
    public static function execute (){
      $processServerElements = ProcessServerElements::start();
      $routArray =[];
       // dd($processServerElements);
      switch($processServerElements->getVerb()){
        case 'GET':

        switch($processServerElements->getRoute()){

            case'/hello-world':
                return (new HelloWorldController)->execute();
                break;


        }
    }
    }
}