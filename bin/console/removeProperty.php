<?php

   //autoload
   require_once 'src/autoload.php';
   require_once 'src/const.php';
   require_once 'src/services/database/dbConn.php';

   use App\model\database\table\Table;

   //build the origin column (entities)
   //connect to the created db

    $entityName = readline("what entity do you want to update? :");
    $columnName = readline("what property do you want to remove? :");

    try{

      $table = new Table($conn, $entityName);
      $columnHandler = $table->getColumnHandler();
      $columnHandler->removeColumn($columnName);

    } catch(PDOException $e)
    {
      echo $e->getMessage();
    }


