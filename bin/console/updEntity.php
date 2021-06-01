<?php

   //autoload
   require_once 'src/autoload.php';
   require_once 'src/const.php';
   require_once 'src/services/database/dbConn.php';

   use App\model\database\table\Table;

   //build the origin column (entities)
   //connect to the created db

    $entityName = readline("what entity do you want to update? :");
    $columnName = readline("what property(database column) do you want to create? :");
    $columnType = readline("what data type do you want to give to this property? :");


    try{

      $table = new Table($conn, $entityName);
      $columnHandler = $table->getColumnHandler();
      $columnHandler->addColumn($columnName, $columnType);

      echo "column $columnName added to $entityName";

    } catch(PDOException $e)
    {
      echo $e->getMessage();
    }


