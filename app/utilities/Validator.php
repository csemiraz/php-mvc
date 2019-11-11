<?php


namespace App\utilities;


class Validator
{

    public static function validate($checker){
           $data = "Hello" ;
            $limit = "2,4";
             switch ($checker) {
                 case 'mobile':
                     if (preg_match("/^[0]/", $data) && preg_match("/^[0-9]*$/", $data)) $status = true;
                     break;
                 case 'number':
                     if (preg_match("/^[0-9]*$/", $data)) $status = true;
                     break;
                 case 'floatNumber':
                     if (preg_match("/\-?\d+\.\d+/", $data)) $status = true;
                     break;
                 case 'noNumber':
                     if (preg_match("/^([^0-9]*)$/", $data)) $status = true;
                     break;
                 case 'letter':
                     if (preg_match("/^([A-Za-z ]*)$/", $data)) $status = true;
                     break;
                 case 'noSpecialChar':
                     if (preg_match('/[`~!@#$%^&*()_|+\-=?;:\'",.<>\{\}\[\]\\\/]/', $data)) $status = true;
                     break;
                 case 'limit':
                     if (preg_match('/^.{' .$limit . '}$/', $data)) $status = true;
                     break;
                 case 'wordLimit':
                     $word = explode(" ",$data)  ;
                     $limits = explode(" ",$limit)  ;
                     if (count($word) >= $limits[0] && count($word) < $limits[1]) $status = true;
                     break;
                 case 'email':
                     if (preg_match('/^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/', $data)) $status = true;
                     break;

             }
    }

}