<?php

   require_once 'src/autoload.php';

   require_once 'src/const.php';
   require_once 'src/services/database/dbConn.php';
   require_once 'src/services/database/tableHandler.php';

   use App\model\database\table\Table;
   use App\model\database\relationships\OneToOne;
   use App\model\database\relationships\OneToMany;
   use App\model\database\relationships\RelationshipContentBuilder;


    $relationshipType = readline("what's the type of relationship you want to build?  (1 for one to one , 2 for one to many):");

    $firstEntity = readline("what's the first entity you want to build the relationship with ? :");
    $secondEntity = readline("what's the second entity you want to build the relationship with ? :");


    $linkedEntities = [$firstEntity, $secondEntity];
     
     //1 => OneToMany
     //2 => One to One


     if($relationshipType == "1" ||$relationshipType == "2" )
     {

        $contentBuilder = new RelationshipContentBuilder($firstEntity, $secondEntity);

        try{

          if($relationshipType == "1"){
  
             $relationship = new OneToOne($conn,$contentBuilder);

          } else if($relationshipType == "2")
          {
             $relationship = new OneToMany($conn, $contentBuilder);
          }


          $relationship->execute();

        } catch (Exception $e)
        {
           echo $e->getMessage();
        }


     } else {

         echo "please, select a valid relationship type";

     }

     
   