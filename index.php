<?php

$mainPosition = __DIR__;


header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: *");

require_once("{$mainPosition}\helper\helper.php");
require_once("{$mainPosition}\\vendor\autoload.php");

use Bootstrap\Env;
use App\FrameworkTools\ProcessServerElements;
use App\FrameworkTools\Implementations\FactoryMethods\FactoryProcessServerElement;
use App\FrameworkTools\Implementations\Route\RouteProcess;

Env::execute();

$factoryProcessServerElement = new FactoryProcessServerElement();
$factoryProcessServerElement->operation();

RouteProcess::execute();