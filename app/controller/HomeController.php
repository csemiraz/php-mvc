<?php


namespace App\controller;


class HomeController
{

    public $request ;

    public function __construct($request)
    {
        $this->request = $request ;
    }


    public  function home(){
     // return  redirect('databaseSetup');
        $name = "AL EMRAN" ;
        return view('index', compact("name"));
    }



}