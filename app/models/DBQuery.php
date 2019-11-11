<?php


namespace App\models;
use App\config\DatabaseConfig;

class DBQuery extends DatabaseConfig
{

    public  function run($query){

      try {
            $this->conn->exec($query) ;

        }
        catch(\PDOException $e)
        {
            return json( $e->getMessage(), 419);
        }

        return true;
      }
}