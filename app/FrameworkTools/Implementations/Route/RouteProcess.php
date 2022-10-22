<?php

namespace App\FrameworkTools\Implementations\Route;

use App\FrameworkTools\ProcessServerElements;




class RouteProcess {

    use Get;
    use Post;
    use Put;

    private static $processServerElements;

    public static function execute() {
        self::$processServerElements = ProcessServerElements::start();
        $routeArray = [];

        switch (self::$processServerElements->getVerb()) {
            case 'GET':
                return self::get();
            case 'POST':
                return self::post();
            case 'PUT':
                return self::put();

        }

    }




}