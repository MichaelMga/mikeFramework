<?php

namespace App\model\database\constraints;

class UniqueConstraint
{
    private $query;
     
    public function __construct($column){    
        $this->query = "UNIQUE ($column)";
    }    

    public function getQuery() : string
    {
        return $this->query;
    }





}