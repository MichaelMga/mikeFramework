<?php

  
 namespace App\model;

 
 class Migration
 {

    private $queries;

    public function __construct($conn)
    {
        $this->conn = $conn;

    }


    public function $runQueries() : void
    { 

        foreach($this->queries as $encodedQuery => $paramsArray){

            try{

               $stmt->$this->conn(prepare($encodedQuery));
               $stmt->execute($paramsArray);

            } catch (PDOException $e)
            {
                echo $e->getMessage();

            }
 
        }


      }




    
 }
