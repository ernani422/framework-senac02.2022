<?php

namespace App\FrameworkTools\Database;

use PDO;

class DatabaseConnection {

    private static $instance;

    private $pdo;

    private function __construct() {
        
        $database = env('DB_DATABASE');
        $user = env('DB_USER');
        $password = env('DB_PASSWORD');
        $host = env('DB_HOST');
        $port = env('DB_PORT');
        

<<<<<<< Updated upstream
        $this->pdo = new PDO( /* mas este pdo e proprio do php*/
=======
        $this->pdo = new PDO(
            "mysql:host=localhost;dbname=frameworksenac;port=3306;",
            "root", 
            ""
        );

        $this->pdo = new PDO(
>>>>>>> Stashed changes
            "mysql:host=localhost;dbname=frameworksenac;port=3306;", 
            "root", 
            ""
        );
    }

    public static function start() {
        if (!DatabaseConnection::$instance) {
            DatabaseConnection::$instance = new DatabaseConnection();
        }

        return DatabaseConnection::$instance;
    }

    public function getPDO() {
        return $this->pdo;
    }
}