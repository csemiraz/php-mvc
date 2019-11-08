<?php


namespace App\controller;


use App\models\ViewLoader;

class DatabaseSetup
{
    public $request ;

    public function __construct($request)
    {
        $this->request = $request ;
    }

    public  function getDBForm(){
       return view('databaseSetup');
    }

}