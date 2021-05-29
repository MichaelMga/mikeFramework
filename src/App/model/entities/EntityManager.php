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

            echo "found the dude";


            //$EntityUpdateQueryBag = new EntityInsertionQueryBag($entity);
/*

            //UPDATE table-name 
           SET column-name1 = value1, 
           column-name2 = value2, ...
           WHERE condition

           INSERT INTO column1,column2 VALUES ( val1, val2)

       */
        } else {

            echo "naah we didnt find the man";

            $EntityInsertionQueryBag = new EntityInsertionQueryBag($entity);
            $table->getRowHandler()->insertRow($EntityInsertionQueryBag->getColumnsString(), $EntityInsertionQueryBag->getValuesString());

        }
    }    

}