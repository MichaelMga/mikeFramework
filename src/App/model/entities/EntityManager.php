<?php

namespace App\model\entities;

use App\model\database\table\Table;
use App\model\entities\EntityInsertionQueryBag;
use App\model\entities\EntityUpdateQueryBag;




class EntityManager
{
    public function __construct($conn)
    {
        $this->conn = $conn;
    }
   
    public function insert(Object $entity)
    {
        $table = new Table($this->conn, $entity->getPropertyValue("table"));

        //else

        if($table->getRowHandler()->findRowFromId(($entity->getPropertyValue("ID"))) == true){

            $EntityUpdateQueryBag = new EntityUpdateQueryBag($entity);
            $table->getRowHandler()->updateRowFromId($entity->getPropertyValue("ID"), $EntityUpdateQueryBag->getUpdateQuery());

        } else {

            $EntityInsertionQueryBag = new EntityInsertionQueryBag($entity);
            $table->getRowHandler()->insertRow($EntityInsertionQueryBag->getColumnsString(), $EntityInsertionQueryBag->getValuesString());

        }

    }   



    public function remove(Object $entity)
    {
        $table = new Table($this->conn, $entity->getPropertyValue("table"));

        //else

        if($table->getRowHandler()->findRowFromId(($entity->getPropertyValue("ID"))) == true){

            $table->getRowHandler()->removeRowFromId($entity->getPropertyValue("ID"));
        }
    }
    
}