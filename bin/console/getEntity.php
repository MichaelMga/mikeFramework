<?php

   //autoload
   require_once 'src/autoload.php';
   require_once 'src/const.php';
   require_once 'src/services/database/tableHandler.php';

  //pass the els collected to build other things
   $entityName = readline("what entity do you want to build? :");

  try{

     $tableHandler->createTable($entityName);

  } catch (Exception $e)
  {
     echo $e->getMessage();
  }


   
   
  