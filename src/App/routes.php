<?php


 $routes = [

    rootUrl => ["name" => "home", "controller" => "App\Controllers\FrontController" , "method" =>  "renderHome" , "parameters" => []  ] ,

    rootUrl . "user/home" => ["name" => "home", "controller" => "App\Controllers\UserController" , "method" =>  "seeUser" , "parameters" => [isset($_SESSION["id"]) ? $_SESSION["id"] : false  ]  ] ,

    rootUrl . "login"=> ["name" => "login", "controller" => "App\Controllers\FrontController" , "method" =>  "displayPage" , "parameters" => ["admin/login/login", []]  ] ,
        rootUrl . "bLogin"=> ["name" => "bLogin", "controller" => "App\Controllers\SecurityController" , "method" =>  "tryToLoginUser" , "parameters" => [$request->getPost("username", "admin"), $request->getPost("hash", "pass")]  ],

    rootUrl . "bLogout"=> ["name" => "bLogout", "controller" => "App\Controllers\SecurityController" , "method" =>  "logout" , "parameters" => []  ] ,

    rootUrl . "register"=> ["name" => "register", "controller" => "App\Controllers\FrontController" , "method" =>  "displayPage" , "parameters" => ["admin/register/register", []]  ],

          rootUrl . "bRegister"=> ["bRegister" => "name", "controller" => "App\Controllers\SecurityController" , "method" =>  "tryToRegisterUser" , "parameters" => [$request->getPost("username", "admin"), $request->getPost("hash", "pass")]  ],

   rootUrl . "users"=> ["name" => "seeUsers", "controller" => "App\Controllers\AdminController" , "method" =>  "seeUsers" , "parameters" => []  ],

          rootUrl . "user"=> ["name" => "seeUsers", "controller" => "App\Controllers\AdminController" , "method" =>  "seeUser" , "parameters" => [$request->getGet("id", 1)]  ],
              rootUrl . "getUserAsync"=> ["name" => "seeUsers", "controller" => "App\Controllers\UserController" , "method" =>  "getUserFromNameAsync" , "parameters" => [$request->getPost("username", false)]  ],


   rootUrl . "project"=> ["name" => "seeProject", "controller" => "App\Controllers\ProjectController" , "method" =>  "renderProjectPage" , "parameters" => [$request->getGet("id", 1)]  ],

         rootUrl . "newProject"=> ["name" => "seeProject", "controller" => "App\Controllers\ProjectController" , "method" =>  "renderProjectCreationPage" , "parameters" => [] ],

               rootUrl . "dbNewProject"=> ["name" => "seeProject", "controller" => "App\Controllers\ProjectController" , "method" =>  "createProjectFromUserName" , "parameters" => [ $request->getPost("project", "myrpject"), $request->getPost("userInput", "mikey") ] ],


   rootUrl . "chat"=> ["name" => "seeProject", "controller" => "App\Controllers\ChatController" , "method" =>  "displayChat" , "parameters" => []  ]

];