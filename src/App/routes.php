<?php


 $routes = [

    rootUrl => ["name" => "name", "controller" => "App\Controllers\FrontController" , "method" =>  "renderHome" , "parameters" => []  ] ,


    rootUrl . "login"=> ["name" => "name", "controller" => "App\Controllers\FrontController" , "method" =>  "displayPage" , "parameters" => ["admin","login", "login"]  ] ,
        rootUrl . "dbLogin"=> ["name" => "name", "controller" => "App\Controllers\SecurityController" , "method" =>  "tryToLoginUser" , "parameters" => [$request->getPost("username", "admin"), $request->getPost("password", "pass")]  ],


    rootUrl . "register"=> ["name" => "name", "controller" => "App\Controllers\FrontController" , "method" =>  "displayPage" , "parameters" => ["admin","register", "register"]  ],

          rootUrl . "dbRegister"=> ["name" => "name", "controller" => "App\Controllers\SecurityController" , "method" =>  "tryToRegisterUser" , "parameters" => [$request->getPost("username", "admin"), $request->getPost("password", "pass")]  ]


];