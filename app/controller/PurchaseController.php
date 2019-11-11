<?php
namespace App\controller;

class PurchaseController
{
    public $request;
    public function __construct($request)
    {
        $this->request = $request;
    }


    public function saveData()
    {

        return json($this->request->get('amount'), 200);
        if (!$this->request->get('database_name') || !$this->request->get('user_name') || !$this->request->get('password')) {
            return json('Please check required Fields', 419);
        }

    }




}