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

   rootUrl . "projects" => ["name" => "seeProject", "controller" => "App\Controllers\ProjectController" , "method" =>  "renderAllProjectsPage" , "parameters" => [$request->getGet("id", 1)]  ],

   rootUrl . "getProjectsFromString" => ["name" => "seeProject", "controller" => "App\Controllers\ProjectController" , "method" =>  "getProjectsMatchingString" , "parameters" => [ $request->getPost("projectString", false) ] ],
   
   rootUrl . "project"=> ["name" => "seeProject", "controller" => "App\Controllers\ProjectController" , "method" =>  "renderProjectPage" , "parameters" => [$request->getGet("id", 1)]  ],

         rootUrl . "newProject"=> ["name" => "seeProject", "controller" => "App\Controllers\ProjectController" , "method" =>  "renderProjectCreationPage" , "parameters" => [] ],

         rootUrl . "updateProjectStatus" => ["name" => "new action", "controller" => "App\Controllers\ProjectController" , "method" =>  "updateProjectStatus" , "parameters" => [$request->getGET("projectId", false) ,  $request->getGET("newStatus", false) ] ],

           rootUrl . "updateProjectPaidAmount" => ["name" => "new action", "controller" => "App\Controllers\ProjectController" , "method" =>  "updateProjectPaidAmount" , "parameters" => [$request->getGET("projectId", false) ,  $request->getGET("amount", false) ] ] ,

               rootUrl . "dbNewProject" => ["name" => "seeProject", "controller" => "App\Controllers\ProjectController" , "method" =>  "createProjectFromUserName" , "parameters" => [ $request->getPost("project", "myrpject"), $request->getPost("username", "mikey"),  $request->getPost("totalPrice", 150) ] ],
         
               rootUrl . "dbNewAction" => ["name" => "new action", "controller" => "App\Controllers\ActionController" , "method" =>  "createAction" , "parameters" => [ $request->getPost("projectId", false), $request->getPost("action", false) ] ],
                      
                        rootUrl . "updateActionStatus" => ["name" => "new action", "controller" => "App\Controllers\ActionController" , "method" =>  "updateActionStatus" , "parameters" => [$request->getGET("actionId", false) ,  $request->getGET("newStatus", false) ] ],

    rootUrl . "chat"=> ["name" => "seeProject", "controller" => "App\Controllers\ChatController" , "method" =>  "displayChat" , "parameters" => []  ],

    rootUrl . "payment" => ["name" => "new action", "controller" => "App\Controllers\PaymentController" , "method" =>  "renderPaymentPage" , "parameters" => [$request->getPost("amount", false), $request->getPost("projectId", false)] ],
   
    rootUrl . "paymentApi" => ["name" => "new action", "controller" => "App\Controllers\PaymentController" , "method" =>  "pay" , "parameters" => [ $request->getPost("stripeToken", false), $request->getPost("mail", false),  $request->getPost("name", false), $request->getPost("amount", false) , $request->getPost("projectId", false) ]  ],

    rootUrl . "successfulPayment" => ["name" => "new action", "controller" => "App\Controllers\PaymentController" , "method" =>  "renderSuccesfulPaymentPage" , "parameters" => [] ]
   
];