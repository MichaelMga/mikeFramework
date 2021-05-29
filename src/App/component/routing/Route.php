<?php

namespace App\Component\Routing;


class Route
{

    private $name;
    private $url;
    private $controller;
    private $method;
    private $parameters;

   
    public function __construct(string $name, string $url, string $controller , string $method, array $parameters){

        $this->name = $name;
        $this->url = $url;
        $this->controller = $controller;
        $this->method = $method;
        $this->parameters = $parameters;

    }


    public function getName(){

         return $this->name;


    }

    
    public function getUrl(){

        return $this->url;
        
    }


    public function getController(){

        return $this->controller;
        
    }


    public function getMethod(){

        return $this->method;

        
    }

    public function getParameters(){

        return $this->parameters;

        
    }




}