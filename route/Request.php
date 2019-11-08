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
        $this->requestBodyDataSet();
        $this->getRequestParamSet();
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
     *set server post data as this class property
     */
    public function requestBodyDataSet()
    {

        if ($this->requestMethod == "POST")
        {

            foreach($_POST as $key => $value)
            {
                $this->{$this->makeCamelCase($key)} = filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }

        }
    }


    /**
     *set get data as this class property
     */
    public function getRequestParamSet()
    {
        if ($this->requestMethod == "GET")
        {

            foreach($_GET as $key => $value)
            {
                $this->{$this->makeCamelCase($key)}= filter_input(INPUT_POST, $key, FILTER_SANITIZE_SPECIAL_CHARS);
            }

        }
    }
}