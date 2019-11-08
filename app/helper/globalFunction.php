<?php


function view($fileName, $data = []){

    if(count($data))
    {
        extract($data);
    }
    require_once __DIR__ .'/../../view/'.$fileName.'.php';

}

function redirect($route = ''){
  header("Location: ". $route);
}