<?php

namespace App\model\entities;

use App\component\httpComponent\Response;
use App\interfaces\FactoryInterface;



class EntityFactory implements FactoryInterface
{

    private $tableHandler;

    
    public function __construct($tableHandler){

        $this->tableHandler = $tableHandler;

    }

    
    public function create($entityName): void
    {

        try{
            $this->tableHandler->createTable($entityName);
        
        } catch(PDOException $e){

            echo $e->getMessage();

        }

    }
    
}