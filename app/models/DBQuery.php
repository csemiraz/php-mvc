<?php


namespace App\models;

use App\config\DatabaseConfig;

class DBQuery extends DatabaseConfig
{

    public function run($query)
    {

        $insert = '';
        try {
            $insert = $this->conn->exec($query);

        } catch (\PDOException $e) {
            return json($e->getMessage(), 419);
        }

        return $insert;
    }
}