<?php

// Singleton to connect db.
class Db {
    // Hold the class instance.
    private static $instance = null;
    private $conn;

    // The db connection is established in the private constructor.
    private function __construct()
    {
        $dbHost     = $_ENV['DB_HOST'];
        $dbPort     = $_ENV['DB_PORT'];
        $dbDatabase = $_ENV['DB_DATABASE'];
        $dbUsername = $_ENV['DB_USERNAME'];
        $dbPassword = $_ENV['DB_PASSWORD'];

        $this->conn = new mysqli($dbHost, $dbUsername, $dbPassword, $dbDatabase, $dbPort);
    }

    public static function getInstance()
    {
        if(!self::$instance) {
            self::$instance = new Db();
        }

        return self::$instance;
    }

    public function getConnection()
    {
        return $this->conn;
    }
}
