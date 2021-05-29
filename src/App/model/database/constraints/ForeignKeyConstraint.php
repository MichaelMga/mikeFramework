<?php

namespace App\model\database\constraints;


class ForeignKeyConstraint
{
    private $query;
     
    public function __construct($refEntity){
        
      $this->query = "FOREIGN KEY (" .  $refEntity . "_id) REFERENCES " . $refEntity . "(ID)";

    }    

    public function getQuery() : string
    {
        return $this->query;
    }



}