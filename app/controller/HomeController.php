<?php


namespace App\controller;


use App\models\DBQuery;
use App\models\Purchase;
use App\utilities\DynamicDBConfig;
use App\utilities\Validator;

class HomeController
{

    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }


    public function home()
    {

        if (!DynamicDBConfig::checkEnv()) {
            return redirect('/databaseSetup');
        }
        $purchase = new Purchase();
        $purchaseData = $purchase->getAll();

        return view('index', compact('purchaseData'));
    }


}