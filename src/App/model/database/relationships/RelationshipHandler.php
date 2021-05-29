<?php

namespace App\model\database\relationships;

use App\model\database\table\handlers\ColumnHandler;
use App\model\database\relationships\ConstraintBuilder;



class RelationshipHandler extends ColumnHandler
{   

    private $relationship;

    public function __construct(Object $relationship)
    {

        $this->relationship =  $relationship;

    }

    

    public function execute()
    {
        $firstEntity = $this->relationship->getContentBuilder()->getFirstEntity();
        $secondEntity = $this->relationship->getContentBuilder()->getSecondEntity();

        echo "executing...";

        //ADD CONSTRAINT

        //$this->addConstraint($firstEntity, $secondEntity);

        //ADD COLUMN

        

    }


    
    public function remove()
    {

        //REMOVE CONSTRAINT

        //REMOVE COLUMN(S)
    }




    


}


