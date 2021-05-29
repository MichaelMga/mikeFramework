<?php

   //autoload

   require_once 'src/autoload.php';
   require_once 'src/const.php';

   use App\model\database\DatabaseFactory;
   use App\model\database\TableUpdater;

   DatabaseFactory::create(dbHost, dbUsername, dbPassword, dbName);

   //build the origin column (entities)
   //connect to the created db
