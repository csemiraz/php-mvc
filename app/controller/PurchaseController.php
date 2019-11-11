<?php

namespace App\controller;

use App\config\DatabaseConfig;
use App\models\DBQuery;
use App\models\Purchase;
use App\utilities\DynamicDBConfig;
use App\utilities\Validator;

class PurchaseController
{
    public $request;

    public function __construct($request)
    {
        $this->request = $request;
    }


    public function saveData()
    {

        $check = Validator::execute($this->request, [
            'amount' => 'required|number',
            'buyer' => 'required|noSpecialChar|limit:20,50',
            'receipt_id' => 'required|letter',
            'buyer_email' => 'required|email',
            'note' => 'required|wordLimit:2,30',
            'city' => 'required|letter',
            'phone' => 'required|mobile',
            'entry_by' => 'required|number'
        ]);

       if (!$check['status']) {
           return json($check, 419);
       }

        $purchase = new Purchase();
        $insert =  $purchase->insert($this->request);

        sessionFlash('message', "Insert Successfully");
       return json($insert)  ;


    }


}