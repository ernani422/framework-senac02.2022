<?php

namespace App\FrameworkTools\Abstracts\Controllers;

use App\FrameworkTools\ProcessServerElements;
use App\FrameworkTools\Database\DatabaseConnection;

abstract class AbstractControllers {
    
    protected $processServerElements;
    protected $pdo;

    public function __construct() {
        $typeOfAPI = env('TYPE_API');
        header("Content-Type: application/$typeOfAPI");

        $this->processServerElements = ProcessServerElements::start();
        $this->pdo = DatabaseConnection::start()->getPDO();
    }

}