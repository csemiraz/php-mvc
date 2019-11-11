<?php


    function  unsetFlashSession(){
        foreach($_SESSION as $key => $value)
        {
            if (strpos($key, 'app_flash_') === 0)
            {
                unset ($_SESSION[$key]);
            }
        }
    }


    function flash($name, $message = '')
        {
            if($message){
                $_SESSION["app_flash_" .$name] = $message;
            }else{
                return  $_SESSION["app_flash_" .$name] ?? '';
            }
        }


    function view($fileName, $data = [])
        {

            if (count($data)) {
                extract($data);
            }
            require_once __DIR__ . '/../../view/' . $fileName . '.php';
            unsetFlashSession();
        }


    function redirect($route = '')
        {
            $dir =  dirname($_SERVER['PHP_SELF']) ;
            header("Location: " . $dir.$route);
        }


    function json($data = [], $code = 200)
        {
            header_remove();
            http_response_code($code);
            header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
            header('Content-Type: application/json');
            $status = array(
                200 => '200 OK',
                400 => '400 Bad Request',
                422 => 'Unprocessable Entity',
                419 => 'Unauthenticated Entity',
                500 => '500 Internal Server Error'
            );
            header('Status: ' . $status[$code]);
            echo json_encode($data);
            return;
        }