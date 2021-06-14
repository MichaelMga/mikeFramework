<?php

 spl_autoload_register(function($className){

    $classPath = str_replace("\\","/", $className);


    if(file_exists("src/$classPath.php")){

      require_once "src/$classPath.php";

    }


 });