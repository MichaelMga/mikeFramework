<?php


 $routes = [

    rootUrl => ["name" => "name", "controller" => "App\Controllers\FrontController" , "method" =>  "renderHome" , "parameters" => []  ] ,


    rootUrl . "login"=> ["name" => "name", "controller" => "App\Controllers\FrontController" , "method" =>  "displayPage" , "parameters" => ["admin","login", "login"]  ] ,
        rootUrl . "bLogin"=> ["name" => "name", "controller" => "App\Controllers\SecurityController" , "method" =>  "tryToLoginUser" , "parameters" => [$request->getPost("username", "admin"), $request->getPost("hash", "pass")]  ],

    rootUrl . "bLogout"=> ["name" => "name", "controller" => "App\Controllers\SecurityController" , "method" =>  "logout" , "parameters" => []  ] ,


    rootUrl . "register"=> ["name" => "name", "controller" => "App\Controllers\FrontController" , "method" =>  "displayPage" , "parameters" => ["admin","register", "register"]  ],

          rootUrl . "bRegister"=> ["name" => "name", "controller" => "App\Controllers\SecurityController" , "method" =>  "tryToRegisterUser" , "parameters" => [$request->getPost("username", "admin"), $request->getPost("hash", "pass")]  ]


];