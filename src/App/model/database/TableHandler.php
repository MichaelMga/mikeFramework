<?php

  namespace App\model\database;


  use App\model\database\table\Table;


  class TableHandler{
    
    private $conn;

    public function __construct($conn)
    {
        $this->conn = $conn;
    }

    public function createTable(string $tableName): void
    {
        try{
            
            $sql = "CREATE TABLE $tableName(ID INT PRIMARY KEY AUTO_INCREMENT)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            echo "table $tableName created!!";

        } catch(PDOException $e){
            echo $e->getMessage();
        }
  
    }

    public function removeTable(string $tableName): void
    {
        try{
            $sql = "DROP TABLE $tableName";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            
            echo "$tableName dropped!!";

        } catch(PDOException $e){
            echo $e->getMessage();
        }
  
    }



    
    public function getTable($tableName): Table
    {    
        try{
            
            $sql = "SELECT * FROM $tableName";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

            return new Table($this->conn, $tableName);

        } catch (PDOException $e)
        {

            echo $e->getMessage();

        }
        


    }


    public function findTable($tableName): void
    {    
        try{
            $sql = "SELECT * FROM $tableName";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
 
        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
        
    }






    public function updateTableName($oldName, $newName): array
    {

        try{

        } catch(PDOException $e){

            echo $e->getMessage();

        }

    }


 }