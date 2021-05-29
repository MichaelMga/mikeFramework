<?php
  
     use App\model\database\TableHandler;

     require 'src/services/database/DbConn.php';
     
     $tableHandler = new TableHandler($conn);