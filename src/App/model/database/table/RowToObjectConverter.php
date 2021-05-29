<?php

namespace App\model\database\table;

use App\model\entities\Entity;


class RowToObjectConverter
{

    public function __construct($row, $table)
    {
        $this->object = new Entity();

        $this->object->setProperty("table", $table);

   
        foreach($row as $key => $value)
        {
            if(gettype($key) !== "integer"){
                $this->object->setProperty($key,$value);
            }
        }

    }


    public function getObject()
    {

        return $this->object;

    }

}