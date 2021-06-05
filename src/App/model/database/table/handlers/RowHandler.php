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
            echo "rows not found ";
            echo $e->getMessage();

          }

    }





    public function findRowFromProperty($property, $value)
    {
        try{
            $sql = "SELECT * FROM $this->table WHERE $property=:property" ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([":property" => $value]);

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
            echo "row not found";
            echo $e->getMessage();

          }

    }



    
    public function findRowFromProperties(array $array)
    {      
           $whereEncodedChain = "";
           $wherePrepareArray = [];


            $i = 0;

           foreach($array as $key => $value)
           {
             $whereEncodedChain .= "$key = :val$i";
             $wherePrepareArray[":val$i"] = $value;

            if($i < count($array) - 1 )
            {
                $whereEncodedChain .= " AND ";
            }
              $i++;

           }
           
    

        try{
            $sql = "SELECT * FROM $this->table WHERE $whereEncodedChain" ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute($wherePrepareArray);
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
            echo "row not found";
            echo $e->getMessage();

          }

    }


    public function getRowFromProperty($property, $value)
    {
        try{
            $sql = "SELECT * FROM $this->table WHERE $property=:property" ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([":property" => $value]);

            $result = $stmt->fetchAll();
            return $result[0];

          } catch (PDOException $e)
          {
            echo "row not found ";
            echo $e->getMessage();

          }

    }


    public function getAllRowsFromProperties(array $array)
    {
      $whereEncodedChain = "";
      $wherePrepareArray = [];


       $i = 0;

      foreach($array as $key => $value)
      {
        $whereEncodedChain .= "$key = :val$i";
        $wherePrepareArray[":val$i"] = $value;

       if($i < count($array) - 1 )
       {
           $whereEncodedChain .= " AND ";
       }
         $i++;

      }
      


     try{
         $sql = "SELECT * FROM $this->table WHERE $whereEncodedChain" ;
         $stmt = $this->conn->prepare($sql);
         $stmt->execute($wherePrepareArray);
         $result = $stmt->fetchAll();

       return $result;

     } catch (PDOException $e)
     {
       echo "row not found";
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


    public function getAllRowsSortedBy($sortTarget, $sortDirection) : array
    {

      $sql = "SELECT * FROM $this->table ORDER BY $sortTarget $sortDirection" ;
      $stmt = $this->conn->prepare($sql);
      $stmt->execute();

      return $stmt->fetchAll();

    }



    public function getAllRowsFromProperty($property, $value)
    {

        try{
            $sql = "SELECT * FROM $this->table WHERE $property=:property" ;
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([":property" => $value]);

            $result = $stmt->fetchAll();
            return $result;

          } catch (PDOException $e)
          {
            echo "row not found ";
            echo $e->getMessage();

          }

    }



    public function getAllRowsFromPropertySortedBy($property, $value, $sortTarget, $sortDirection)
    {

      try{
        $sql = "SELECT * FROM $this->table WHERE $property=:property ORDER BY  $sortTarget $sortDirection" ;
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([":property" => $value]);

        $result = $stmt->fetchAll();
        return $result;

      } catch (PDOException $e)
      {
        echo "row not found ";
        echo $e->getMessage();

      }


    }


    
    public function getAllRowsFromPropertiesSortedBy(array $array, $sortTarget, $sortDirection)
    {
      $whereEncodedChain = "";
      $wherePrepareArray = [];


       $i = 0;

      foreach($array as $key => $value)
      {
        $whereEncodedChain .= "$key = :val$i";
        $wherePrepareArray[":val$i"] = $value;

       if($i < count($array) - 1 )
       {
           $whereEncodedChain .= " AND ";
       }
         $i++;

      }
      


     try{
         $sql = "SELECT * FROM $this->table WHERE $whereEncodedChain ORDER BY $sortTarget $sortDirection" ;
         $stmt = $this->conn->prepare($sql);
         $stmt->execute($wherePrepareArray);
         $result = $stmt->fetchAll();

       return $result;

     } catch (PDOException $e)
     {
       echo "row not found";
       echo $e->getMessage();

     }


    }




    public function updateRowFromId(int $id ,string $updateQuery) : void
    {
        $sql = "UPDATE $this->table SET $updateQuery WHERE ID=$id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
    }

    public function removeRowFromID($id) : void
    {
        $sql = "DELETE FROM $this->table WHERE ID=:id";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
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