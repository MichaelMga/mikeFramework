<?php

   require_once 'src/autoload.php';

   require_once 'src/const.php';
   require_once 'src/services/database/dbConn.php';
   require_once 'src/services/database/tableHandler.php';

   use App\model\database\table\Table;
   use App\model\database\relationships\OneToOne;
   use App\model\database\relationships\OneToMany;
   use App\model\database\relationships\RelationshipContentBuilder;


    $relationshipType = readline("what's the type of relationship you want to remove? :");

    $firstEntity = readline("what's the first entity you want to remove the relationship from ? :");
    $secondEntity = readline("what's the second entity you want to remove the relationship from ? :");


    $linkedEntities = [$firstEntity, $secondEntity];
     
     //1 => OneToMany
     //2 => One to One


     if($relationshipType == "1" ||$relationshipType == "2" )
     {

        $contentBuilder = new RelationshipContentBuilder($firstEntity, $secondEntity);


          if($relationshipType == "1"){
  
            $relationship = new OneToOne($conn,$contentBuilder);

          } else if($relationshipType == "2")
          {
             $relationship = new OneToMany($conn, $contentBuilder);
          }



          try{

            $relationship->checkValidity();

            
            for($i=0; $i < count($linkedEntities); $i++)
            { 
  
             $entity = $linkedEntities[$i];
             $linkedEntitiesCopy = $linkedEntities;
             $otherEntity = array_splice($linkedEntitiesCopy, $i ,1)[0];
             $columnToRemove = $otherEntity . "_id";
  
                try{
  
                     $tableHandler->getTable($entity);
                     $table = new Table($conn, $entity);
   
                    //DROP CONSTRAINT

                  
                    //DROP COLUMN
            
                      $table->getColumnHandler()->getRelationshipHandler($relationship)->remove();

  
                    } catch (Exception $e){
   
                          echo $e->getMessage();
   
                     }       
  
             }


          } catch (Exception $e){

              echo $e->getMessage();

          }
   

     } else {

         echo "please, select a valid relationship type";

     }

     
   