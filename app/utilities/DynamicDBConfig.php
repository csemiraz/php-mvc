<?php


namespace App\utilities;


class DynamicDBConfig
{


    public static function checkEnv(){
        if(file_exists(__DIR__ . "/../config/db.env")){
            return true;
        }
        return false;
    }

    public static function readEnvFile(){

        $databaseName = null;
        $databaseUserName = null;
        $databasePassword = null ;

        if(file_exists(__DIR__ . "/../config/db.env")){

            $configData = '';
            $readFile = fopen(__DIR__ . "/../config/db.env", "r")  ;

            while(!feof($readFile)) {
                $configData  = fgets($readFile)  ;
                $explode = explode('=', $configData ) ;

                if($explode[0] == 'database'){
                    $databaseName =  $explode[1]  ;
                }
                if($explode[0] == 'user_name'){
                    $databaseUserName =  $explode[1]  ;
                }
                if($explode[0] == 'password'){
                    $databasePassword =  $explode[1]  ;
                }

            }

            fclose($readFile);

        }

        return [
            "database" => trim($databaseName),
            "user" => trim($databaseUserName),
            "password" => trim($databasePassword),
        ];
    }


    public  static function createEnvFile($data){
        $fp = fopen(__DIR__ . "/../config/db.env", 'w') or die('Sorry! permission problem');
        fwrite($fp, $data);
        // chmod("filename.php", 0644);
        fclose($fp);

        return true;
    }

}