<?php

 namespace App\model\entities;

  use App\model\entities\Entity;
  use App\model\database\table\Table;
  use App\model\database\table\RowToObjectConverter;




 class Repository
 {
    private $table;

    public function __construct($conn, $table){
        $this->table = $table;
        $this->tableConn = new Table($conn, $table);
    }

    public function getElementFromId(int $id)
    {
       if($this->tableConn->getRowHandler()->findRowFromId($id) == true )
       {
           $rowArray = $this->tableConn->getRowHandler()->getRowFromId($id);
           $rowConverter = new RowToObjectConverter($rowArray, $this->table);
           $entity = $rowConverter->getObject();

           return $entity;

       } else {

           echo "this entity was not found";
           return false;
           
       }

       //convert it into an object
   
    }



    public function getElementFromProperty(string $property, $value)
    {

        if($this->tableConn->getRowHandler()->findRowFromProperty($property,$value) == true )
        {
            $rowArray = $this->tableConn->getRowHandler()->getRowFromProperty($property,$value);
            $rowConverter = new RowToObjectConverter($rowArray, $this->table);
            $entity = $rowConverter->getObject();

            return $entity;
    
        } else {
            echo "this row was not found";
            return false;
        }
 
    }


 }