<?php

require_once 'app/bootstrap/Start.php';

use App\controller\HomeController;
use App\controller\PurchaseController;
use App\models\Purchase;
use Route\Request;
use Route\Router;
use App\controller\DatabaseSetup;
//$purchase = new Purchase();


$router = new Router(new Request);


$router->get('/', function($request) {
    $controller =  new HomeController($request) ;
   return $controller->home();
});

$router->post('/saveData', function($request) {
    $controller =  new PurchaseController($request) ;
   return $controller->saveData();
});



$router->get('/databaseSetup', function($request)   {
    $controller =  new DatabaseSetup($request) ;
    return $controller->getDBForm();
});


$router->post('/databaseSetup', function($request)   {
    $controller =  new DatabaseSetup($request) ;
    return $controller->saveDBConfig();
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

