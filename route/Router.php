<?php
namespace Route;

class Router
{

    private $request;
    public $routes = [];

    private $supportedMethods = array(
        "GET",
        "POST"
    );

    /**
     * Router constructor.
     * @param Request $request
     */
    function __construct(Request $request)
    {
        $this->request = $request;
    }


    /**
     * @param $methodName
     * @param $arguments
     */
    function __call($methodName, $arguments)
    {
        // make list from argument and closer function
        list($route, $method) = $arguments;
        array_push($this->routes,$route);
        // check method name exist in supported methods array
        if (!in_array(strtoupper($methodName), $this->supportedMethods)) {
            $this->invalidMethodHandler();
        }
        $this->{strtolower($methodName)}[$this->formatRoute($route)] = $method;
    }


    /**
     * @param $route
     * @return string
     */
    private function formatRoute($route)
    {
        $result = rtrim($route, '/');
        if ($result === '') {
            return '/';
        }
        return $result;
    }

    /**
     *if method is not valid
     */
    private function invalidMethodHandler()
    {
        echo "Method Not Allowed";
        header("{$this->request->serverProtocol} 405 Method Not Allowed");
        exit;

    }

    /**
     *if method not found then 404;
     */
    private function notFound()
    {
        echo "No Route Found";
        header("{$this->request->serverProtocol} 404 Not Found");
        exit;
    }

    public function currentRoute(){

        $base = $_SERVER['SERVER_NAME'] . dirname($_SERVER['PHP_SELF'])   ;
        $full =    $_SERVER['SERVER_NAME'] .$_SERVER['REQUEST_URI'] ;

        return substr($full, strlen($base) );
    }

    /**
     * checking route
     */
    function routeChecking()
    {
        $methodDictionary = $this->{strtolower($this->request->requestMethod)} ?? '';
        $formattedRoute = $this->formatRoute($this->currentRoute());

        if (!isset($methodDictionary[$formattedRoute])) {

            if (isset($this->{'get'}[$formattedRoute]) || isset($this->{'post'}[$formattedRoute])) {
                $this->invalidMethodHandler();

            } else {
                echo $this->notFound();
            }
        }


        $method = $methodDictionary[$formattedRoute];
        if (is_null($method)) {
            $this->defaultRequestHandler();
            return;
        }
        return call_user_func_array($method, array($this->request));
    }

    function __destruct()
    {
        $this->routeChecking();
    }


}