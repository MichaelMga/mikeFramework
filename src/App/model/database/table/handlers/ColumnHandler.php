<?php

 namespace App\model\database\table\handlers;

 use App\model\database\relationships\RelationshipHandler;

class ColumnHandler 
{   
    private $table;
    private $conn;

    public function __construct($conn, string $table)
    {
        $this->table = $table;
        $this->conn = $conn;
    }


    public function addColumn($columnName , $columnType) : void
    {

        try{
          
           $sql="ALTER TABLE $this->table ADD $columnName $columnType";
           $stmt = $this->conn->prepare($sql);
           $stmt->execute();
 
        } catch (PDOException $e)
        {
           echo $e->getMessage();
        }

    }


    public function removeColumn($columnName) : void
    {

        
        try{ 
            $sql="ALTER TABLE $this->table DROP $columnName";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
 
         } catch (PDOException $e)
         {
            echo $e->getMessage();
 
         }
 


    }


    public function updateColumnName($oldName, $newName) : void
    {

        try{

            $sql="ALTER TABLE $this->table RENAME :oldName TO :newName";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([":oldName" => $oldName , ":newName" => $newName]);

         } catch (PDOException $e)
         {
            echo $e->getMessage();
 
         }
 


    }

    public function updateColumnType($columnName, $newType) : void
    {

        try{
        
            $sql="ALTER TABLE $this->table ALTER COLUMN :columnName :newType";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([":columnName" => $columnName , ":newType" => $newType]);

         } catch (PDOException $e)
         {
            echo $e->getMessage();
 
         }
 

    }


    public function addConstraint(Object $constraintObj)
    {
       try{
         $constraint = $constraintObj->getQuery();

         $sql = "ALTER TABLE $this->table ADD CONSTRAINT $constraint";
         $stmt = $this->conn->prepare($sql);
         $stmt->execute();

         echo "constraint $constraint added!";

       } catch (PDOException $e)
       {
         echo $e->getMessage();
       }
 
    
      }

    public function removeConstraint()
    {

    }




    public function getRelationshipHandler(Object $relationship) : Object
    {

       return new RelationshipHandler($relationship);

    }















    

    
}