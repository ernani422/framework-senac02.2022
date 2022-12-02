<?php

namespace App\FrameworkTools\Implementations\Route;

use App\FrameworkTools\ProcessServerElements;
use App\FrameworkTools\Implementations\Route\Get;
use App\FrameworkTools\Implementations\Route\Post;
use App\FrameworkTools\Implementations\Route\Put;
use App\FrameworkTools\Implementations\Route\Delete;


class Route {

    use Get;
    use Post;
    use Put;
    use Delete;

    private static $processServerElements;

    public static function RouteProcess() {
        self::$$processServerElements = ProcessServerElements::start();
        $routeArray = [];

        switch (self::$processServerElements->getVerb()) {
            case 'GET':
                return self::get();
            case 'POST':
                return self::post();
            case 'PUT':
                return self::put();
            case 'DELETE':
                return self::delete();

        }

    }

}