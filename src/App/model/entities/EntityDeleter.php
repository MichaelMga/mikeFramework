<?php

namespace App\model\entities;

use App\component\httpComponent\Response;
use App\interfaces\FactoryInterface;
use App\interfaces\database\TableHandler;



class EntityDeleter
{

    private $tableHandler;

    
    public function __construct($tableHandler){

        $this->tableHandler = $tableHandler;

    }

    
    public function remove($entityName): void
    {

        try{
            $this->tableHandler->removeTable($entityName);
        
        } catch(PDOException $e){

            echo $e->getMessage();

        }

    }
    
}