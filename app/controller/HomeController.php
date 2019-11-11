<?php


namespace App\controller;


use App\models\DBQuery;
use App\utilities\DynamicDBConfig;

class HomeController
{

    public $request ;

    public function __construct($request)
    {
        $this->request = $request ;
    }


    public  function home(){

        if (!DynamicDBConfig::checkEnv()) {
            return redirect('/databaseSetup');
        }
        return view('index');
    }



}