<?php

namespace App\config;

use App\utilities\DynamicDBConfig;

class DatabaseConfig
{

    private $host = "localhost";
    private $database = "";
    private $username = "";
    private $password = "";
    public $conn;
    public $connectionStatus = '';

    public function getConnection()
    {
        $this->setConfig();
        try {
            $this->conn = new \PDO("mysql:host=localhost;dbname=" . $this->database, $this->username, $this->password);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            $this->connectionStatus = "Connected";
        } catch (\PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            //  return redirect('databaseSetup');
            $this->connectionStatus = "Not Connected";
        }


    }

    public function __construct()
    {
        $this->getConnection();
    }

    public function setConfig()
    {
        $config = DynamicDBConfig::readEnvFile();

        if (isset($config['database']) && $config['database']) {
            $this->database = $config['database'];
            $this->username = $config['user'];
            $this->password = $config['password'];

        }
    }


}