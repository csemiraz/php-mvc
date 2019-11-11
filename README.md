# Project Highlight

<ul> 
<li>PSR-4 
 <pre>
  "psr-4": {
      "App\\": "app/",
      "Route\\": "route/"
    }
 </pre>
 </li>
<li>Routing System
<pre>

$router->get('/', function($request) {
    $controller =  new HomeController($request) ;
   return $controller->home();
});

$router->post('/saveData', function($request) {
    $controller =  new PurchaseController($request) ;
   return $controller->saveData();
});

</pre>
</li>
<li> MVC </li>
<li> Database COnfigaration setup from Form Input
<pre>
   $configData = 'database=' . $this->request->get('database_name') . PHP_EOL;
        $configData .= 'user_name=' . $this->request->get('user_name') . PHP_EOL;
        $configData .= 'password=' . $this->request->get('password') . PHP_EOL;

        // generate env file
        DynamicDBConfig::createEnvFile($configData);
  </pre>
  </li>
<li> Helper Function for redirect , json response, view
 <pre>
 
// return as json
function json($data = [], $code = 200)
{
    header_remove();
    http_response_code($code);
    header("Cache-Control: no-transform,public,max-age=300,s-maxage=900");
    header('Content-Type: application/json');
    $status = array(
        200 => '200 OK',
        400 => '400 Bad Request',
        422 => 'Unprocessable Entity',
        419 => 'Unauthenticated Entity',
        500 => '500 Internal Server Error'
    );
    header('Status: ' . $status[$code]);
    echo json_encode($data);
    return;
}

// redirect expected route
function redirect($route = '')
{
    $dir = dirname($_SERVER['PHP_SELF']);
    header("Location: " . $dir . $route);
}
  
    
 </pre></li>
<li> Data COmpact from controller and extract from view and access from View File 
<pre>
   $purchase = new Purchase();
   $purchaseData = $purchase->getAll();
   return view('index', compact('purchaseData'));
    
 function view($fileName, $data = [])
{
    if (count($data)) {
        extract($data);
    }
    require_once __DIR__ . '/../../view/' . $fileName . '.php';
    unsetFlashSession();
}
        
</pre>
</li>
<li> Flush Session for one-time (reset after page loaded)
<pre>
// unset flush session
function unsetFlashSession()
{
    foreach ($_SESSION as $key => $value) {
        if (strpos($key, 'app_flash_') === 0) {
            unset ($_SESSION[$key]);
        }
    }
}


// set or get session
function sessionFlash($name, $message = '')
{
    if ($message) {
        $_SESSION["app_flash_" . $name] = $message;
    } else {
        return $_SESSION["app_flash_" . $name] ?? '';
    }
}
</pre>
</li>

<li>
 Data Validation System  with PHP
    
 <pre>
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
 <pre>
    
</li>
</ul>
 
