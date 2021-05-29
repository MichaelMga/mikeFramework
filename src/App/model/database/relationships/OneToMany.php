<?php

namespace App\model\database\relationships;

use App\model\database\table\Table;
use App\interfaces\database\relationships\RelationshipInterface;
use App\model\database\constraints\UniqueConstraint;
use App\model\database\constraints\ForeignKeyConstraint;




 class OneToMany implements RelationshipInterface
 {
     private $contentBuilder;
     private $conn;
     private $firstEntityTable;
     private $secondEntityTable;
     private $firstEntity;
     
     public function __construct($conn , Object $contentBuilder)
     {
         $this->conn = $conn;
         $this->contentBuilder = $contentBuilder;
         $this->firstEntity = $contentBuilder->getFirstEntity();
         $this->secondEntity = $contentBuilder->getSecondEntity();
 
 
         try{
 
             $this->firstEntityTable = new Table($conn, $contentBuilder->getFirstEntity());
             $this->secondEntityTable = new Table($conn, $contentBuilder->getSecondEntity());
 
         } catch (Exception $e)
         {
             echo $e->getMessage();
 
         }
     }

 

  
 
     public function execute() : void
     {
         $this->triggerColumnBuilding();
         $this->triggerConstraintBuilding();
     }
 
     public function triggerConstraintBuilding() : void
     {

 
         $secondEntityUniqueConstraint = new UniqueConstraint($this->firstEntity . '_id');
         $this->secondEntity->getColumnHandler()->addConstraint($secondEntityUniqueConstraint);
 
         $secondEntityFkConstraint = new ForeignkeyConstraint($this->firstEntity);
         $this->secondEntity->getColumnHandler()->addConstraint($secondEntityFkConstraint);
 

     }
 
 
     public function triggerColumnBuilding() : void
     {
         $this->secondEntityTable->getColumnHandler()->addColumn($this->firstEntity . "_id","INT");
     }
 
 
  
     public function remove() : void
     {
           echo "removing a one to one relationship";
 
           //removing in both ways
 
           try{
 
              //first entity
 
              $sql = "DROP TABLE " . $this->contentBuilder->getSecondEntity() . "_id";
              $stmt = $this->conn->prepare($sql);
              $stmt->execute();
 
              //second entity 
 
              $sql = "DROP TABLE " . $this->contentBuilder->getFirstEntity() . "_id";
              $stmt = $this->conn->prepare($sql);
              $stmt->execute();
 
             
           } catch (PDOException $e) {
               
             echo $e->getMessage();
 
           }
     
     }
 
 
     public function checkValidity() : void
     {
 
         try{
 
             //is the column there in both tables?
 
             //first entity
 
              $sql = "SELECT * FROM " . $this->contentBuilder->getSecondEntity() . "_id";
              $stmt = $this->conn->prepare($sql);
              $stmt->execute();
 
              //second entity
 
              $sql = "SELECT * FROM " . $this->contentBuilder->getFirstEntity() . "_id";
              $stmt = $this->conn->prepare($sql);
              $stmt->execute();
 
 
             //second entity
 
 
             //check if the relationship exists both ways
 
         } catch(PDOException $e)
         {
 
             echo $e->getMessage();
 
             echo "/We noticed that this relationship is not valid. We couldn't find the right reference column in both entities";
 
 
         }
 
         
     }
 
 
     public function getContentBuilder() : Object
     {
 
         return $this->contentBuilder;
 
     }
 
 
 }