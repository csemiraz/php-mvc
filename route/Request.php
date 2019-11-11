<?php
namespace Route;

class Request
{

    function __construct()
    {
        $this->requestDataSet();
    }


    /**
     *
     * set all requested data as this class property;
     */
    public function requestDataSet(){
        $this->serverRequestDataSet();
    }


    /**
     *set server global data as this class property
     */
    private function serverRequestDataSet()
    {
        foreach($_SERVER as $key => $value)
        {
            $this->{$this->makeCamelCase($key)} = $value;
        }
    }


    /**
     * make camel case
     * @param $string
     * @return mixed|string
     */
    private function makeCamelCase($string)
    {
        $result = strtolower($string);

        preg_match_all('/_[a-z]/', $result, $matches);
        foreach($matches[0] as $match)
        {
            $c = str_replace('_', '', strtoupper($match));
            $result = str_replace($match, $c, $result);
        }
        return $result;
    }



    /**
     *  get data from request
     * @param $name
     * @return string
     */
    public function get($name)
    {
        if ($this->requestMethod == "POST"){
            return $_POST[$name] ?? null ;

        } else  if ($this->requestMethod == "GET"){
            return $_GET[$name] ?? null ;
        }
    return null  ;
    }


}