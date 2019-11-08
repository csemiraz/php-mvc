<?php


namespace App\models;


class ViewLoader
{

    public static  function view($filename){

        require_once '/view/' .$filename.".php";
    }
}