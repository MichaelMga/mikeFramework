<?php


namespace App\Component\Routing\Matcher;

class RouteMatcher
{

    private $routes;

    public function __construct(array $routes)
    {

        $this->routes = $routes;
        
    }


    public function routeFound(string $url)
    {

        if(isset($this->routes[$url])){

            return true;

        } else {

            return false;
        }


    }



}