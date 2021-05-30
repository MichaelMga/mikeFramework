<?php

 namespace App\controllers;

 require_once 'src/autoload.php';

 use App\controllers\abstractClass\AbstractController;
 use App\component\httpComponent\Response;
 use App\model\entities\Entity;


 require_once "src/services/database/entityManager.php";




class ProjectController extends AbstractController
{


    public function createProject($projectName , $userId ) : void
    {  

        $entityManager = $this->getEntityManager();

         $project = new Entity();
         $project->setProperty("table", "project");
         $project->setProperty("name", $projectName);
         $project->setProperty("user_id", $userId);
         $project->setProperty("status", "pending");
         $project->setProperty("ID", 0);
         
         $entityManager->insert($project);
          
    }



    
    public function getProjectFromId($projectId) : Object
    {  

        $project = $this->getSuperOrm()->getRepository("project")->getElementFromId($projectId);

        return $project;
     
    }



    public function getProjectsPerUser($userId) : array
    {
        $projects = $this->getSuperOrm()->getRepository("project")->getAllElementsFromProperty("user_id", $userId);
        
        return $projects;

    }

    


}