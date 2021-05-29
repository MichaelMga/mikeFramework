<?php

   //autoload
   require_once 'src/autoload.php';
   require_once 'src/const.php';
   require_once 'src/services/database/tableHandler.php';
   require_once 'src/services/database/dbConn.php';

   use App\model\database\table\Table;

  //pass the els collected to build other things

   $entityName = readline("what entity do you want to update ? :");
  
  try{
     
     $table = new Table($conn, $entityName);
     $table->getRowHandler()->updateRow("name","1", "James");

  } catch (Exception $e)
  {
     echo $e->getMessage();
  }
