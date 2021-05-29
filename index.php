<?php

 //require_once $_SERVER["DOCUMENT_ROOT"] . '/MikeFramework/vendor/autoload.php';

 require_once __DIR__ . '/src/autoload.php';
 require_once __DIR__ . '/src/const.php';
 
 use App\component\httpComponent\Request;
 use App\component\httpComponent\Response;
 use App\component\Routing;

 $request = Request::createFromSuperGlobals();
 $url = $request->getUrl();

 require_once __DIR__ . '/src/App/routes.php';

 $matcher = new routing\matcher\RouteMatcher($routes);

 

 try{

    //does the matcher finds the route

    if($matcher->routeFound($url)){

        $controller = new $routes[$url]["controller"];
        $method = $routes[$url]["method"];
        $parameters = $routes[$url]["parameters"];

        $response = call_user_func_array([$controller,$method] , $parameters );
        
    } else {

        $response = new Response("route not found");
    }

 } catch(Exception $e){
  
    $response = new Response("an error occured");
    $response->setStatusCode(500);

 }



 $response->send();



