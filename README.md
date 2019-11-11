# Project Highlight

<ul> 
<li>PSR-4 </li>
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
<li> Info Alert</li>
<li> Success Alert</li>
<li> Danger Alert</li>
<li> Custom Delay Time as Millisecond. also have default delay time for alert -3/3000 second </li>

</ul>
 
