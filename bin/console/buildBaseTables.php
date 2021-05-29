<?php
 
 require_once 'src/autoload.php';
 require_once 'src/const.php';
 require_once 'src/services/database/dbConn.php';
 require_once 'src/services/database/tableHandler.php';

 use App\model\database\table\Table;
 use App\model\database\constraints\UniqueConstraint;


  try{

    $tableHandler->createTable("controllers"); 
 
    $table = new Table($conn, "controllers");
    $columnHandler = $table->getColumnHandler();
    $columnHandler->addColumn("name", "VARCHAR(30)");

    $uniqueConstraint = new UniqueConstraint("name");
    $columnHandler->addConstraint($uniqueConstraint);

    echo "base tables built ";

  } catch(PDOException $e) 
  {
      echo $e->getMessage();

  }




 