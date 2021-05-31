<?php

namespace App\model\entities;

class EntityUpdateQueryBag
{  
    private $updateQuery;


    public function __construct(Object $entity)
    {
        $this->entity = $entity;
        $this->createQuery();
    }

    public function createQuery()
    {
       $updateQuery = "";

       $propertiesAndValues = $this->entity->getPropertiesAndValues();

       foreach($propertiesAndValues as $property => $value )
       {
          if($property !== "table" && $property !== "ID"){

            
            if(gettype($value) !== "integer")
            {
               $value = "'$value'";
            }

             $updateQuery .= "$property = $value" . ",";

          }
   
       }

       //removing the last ","

       $this->updateQuery = substr($updateQuery,0,-1); 
    }


    public function getUpdateQuery()
    {
        return $this->updateQuery;
    }

  

}





