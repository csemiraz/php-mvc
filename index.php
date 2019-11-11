<?php

require_once 'app/bootstrap/Start.php';

use App\controller\HomeController;
use App\models\Purchase;
use Route\Request;
use Route\Router;
use App\controller\DatabaseSetup;
//$purchase = new Purchase();


$router = new Router(new Request);


$router->get('/', function($request) {
    $db =  new HomeController($request) ;
   return $db->home();
});

$router->get('/Home', function($request) {
    $db =  new HomeController($request) ;
   return $db->home();
});



$router->get('/databaseSetup', function($request)   {
    $db =  new DatabaseSetup($request) ;
    return $db->getDBForm();
});


$router->post('/databaseSetup', function($request)   {
    $db =  new DatabaseSetup($request) ;
    return $db->saveDBConfig();
});



//
//if(file_exists("filename.php")){
//
//$fp=fopen('filename.php','r');
//$dd =  json_decode(fgets($fp));
//echo $dd->DB;
//
//fclose($fp);
//
//}else {
//
//    $fp = fopen('filename.php', 'w');
//    $config = [
//        "DB" => "test"
//    ];
//    fwrite($fp, json_encode($config));
//    chmod("filename.php", 0644);
//    fclose($fp);
//
//}

