<?php

namespace App\model\database;



 abstract class DatabaseFactory
 {

    public static function create($host, $username, $password, $dbName)
    { 
        try{

            $dsn= "mysql:host=$host;dbName=$dbName"; 
            $conn = new \PDO( $dsn , $username, $password);
            $sql = "CREATE DATABASE $dbName";

            $stmt = $conn->prepare($sql);
            $stmt->execute([':dbName' => $dbName]);


            echo "$dbName created!";


        } catch(PDOException $e){

            echo $e->getMessage();

        }

    }


 }