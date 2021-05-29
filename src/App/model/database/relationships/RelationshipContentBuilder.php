<?php

  namespace App\model\database\relationships;

  
  class RelationshipContentBuilder
  {
     private $firstEntity;
     private $firstEntityRefColumn;
     private $firstEntityConstraint;

     private $secondEntity;
     private $secondEntityRefColumn;
     private $secondEntityConstraint;

     public function __construct(string $firstEntity , string $secondEntity)
     {
       $this->firstEntity = $firstEntity;
       $this->firstEntityConstraint = "fk_$firstEntity" . "_$secondEntity";
       $this->firstEntityRefColumn = "$secondEntity" . "_id";
       $this->secondEntity = $secondEntity;
       $this->secondEntityConstraint = "fk_$secondEntity" . "_$firstEntity";
       $this->secondEntityRefColumn = "fk_$secondEntity" . "_id";
     }

     public function getFirstEntity()
     {
       return $this->firstEntity;
     }

     public function getSecondEntity()
     {
       return $this->secondEntity;
     }

     public function getFirstEntityConstraint()
     {
      return $this->firstEntityConstraint;
     }
          
     public function getSecondEntityConstraint()
     {
       return $this->secondEntityConstraint;
     }

     public function getFirstEntityRefColumn()
     {
       return $this->firstEntityRefColumn;
     }

     public function getSecondEntityRefColumn()
     {
       return $this->secondEntityRefColumn;

     }


  }