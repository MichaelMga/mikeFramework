<?php

namespace App\model\entities;


class EntityInsertionQueryBag
{
    private $columnsString;
    private $valuesString;

    public function __construct(Object $entity)
    {
        $this->entity = $entity;
        $this->createQuery();
    }

    public function createQuery()
    {

       $columns = "";
       $values = "";

       $propertiesAndValues = $this->entity->getPropertiesAndValues();

       foreach($propertiesAndValues as $property => $value )
       {
          if($property !== "table" && $property !== "ID"){

             $columns .= $property . ",";

             if(gettype($value) === "integer" )
             {
                $values .= $value . ",";
             } else {
                $values .= "'" . $value . "'" . ",";
             }
          }
   
       }

       //removing the last ","

       $this->columnsString = substr($columns,0,-1); 
       $this->valuesString = substr($values,0,-1);
    }


    public function getColumnsString()
    {
        return $this->columnsString;
    }

    public function getValuesString()
    {
        return $this->valuesString;
    }


}