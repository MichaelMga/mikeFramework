<?php

namespace App\model\database;


class DbConn
{
   private $host;
   private $username;
   private $password;

   public function __construct(string $host, string $username, string $password)
   {
       $this->host = $host;
       $this->username = $username;
       $this->password = $password;

   }


   public function connect($dbname)
   {
      $conn = new \PDO("mysql:host=$this->host; dbname=$dbname", $this->username , $this->password);

      $conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);

      return $conn;
          
   }


}