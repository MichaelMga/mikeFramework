<?php

namespace App\model\database\table\handlers;



class RowHandler
{
    
    private $table;
    private $conn;

    public function __construct($conn, string $table)
    {
        $this->table = $table;
        $this->conn = $conn;

    }

    public function insertRow($properties, $values) : void
    {
        try{
            $sql = "INSERT INTO $this->table($properties) VALUES ($values)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();

        } catch (PDOException $e)
        {
            echo $e->getMessage();
        }
  
        
    }



    public function findRowFromId(string $id)
    {
        try{
            $sql = "SELECT * FROM $this->table WHERE id=:id" ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([":id" => $id]);

            $count = $stmt->rowCount();

            if($count > 0)
            {
                return true;
            } else {
                return false;
            }

            return $result[0];

          } catch (PDOException $e)
          {
            echo "rows not found =================================><=========";
            echo $e->getMessage();

          }

    }



    public function getRowFromId(string $id) : array
    {
         try{
            $sql = "SELECT * FROM $this->table WHERE id=:id" ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([":id" => $id]);

            $result = $stmt->fetchAll();

            return $result[0];

          } catch (PDOException $e)
          {
            echo $e->getMessage();

          }

        }


    public function getAllRows() : array
    {
        $sql = "SELECT * FROM $this->table" ;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();

        return $stmt->fetchAll();
    }


    public function updateRow($row,$id, $value) : void
    {
        $sql = "UPDATE $this->table SET $row='$value' WHERE ID=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function removeRow($id) : void
    {
        $sql = "DELETE FROM $this->table WHERE ID=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }


    public function getTable($table)
    {
        $sql="SELECT * FROM $table";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();

        
        return $result[0];
    }



}