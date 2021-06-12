<?php

 namespace App\controllers;

 require_once 'src/autoload.php';

 use App\controllers\abstractClass\AbstractController;
 use App\component\httpComponent\Response;
 use App\component\httpComponent\JsonResponse;
 use App\model\entities\Entity;


 require_once "src/services/database/entityManager.php";




class ProjectController extends AbstractController
{


    public function createProject($projectName , $userId , int $price ) : void
    {  

        try { 
            
            $entityManager = $this->getEntityManager();
             $project = new Entity();
             $project->setProperty("table", "project");
             $project->setProperty("name", $projectName);
             $project->setProperty("user_id", intval($userId));
             $project->setProperty("total_amount",$price);
             $project->setProperty("paid_amount", 0);
             $project->setProperty("status", "pending");
             $project->setProperty("ID", 0);
        
             $entityManager->insert($project);

        } catch (Exception $e)
        {
            echo $e->getMessage();
        }

    }



    public function createProjectFromUserName(string $projectname, string $username, int $price)
    {

        try{
   
           $userId = $this->getSuperOrm()->getRepository("user")->getElementFromProperty("username", $username)->getPropertyValue("ID");
           $this->createProject($projectname, $userId, $price);
           Header("Location:" . rootUrl);

           return new Response("response");

        } catch(Exception $e)
        {
            echo $e->getMesssage();

        }

    }



    public function updateProjectStatus(int $projectId, string $newStatus) : void
    {
       
      $project = $this->getSuperOrm()->getRepository("project")->getElementFromId($projectId);
      $project->setProperty("status", $newStatus);
      $this->getEntityManager()->insert($project);

      Header("Location:" . rootUrl . "project?id=$projectid");

    }



    
    public function getProjectFromId($projectId) : Object
    {  
        $project = $this->getSuperOrm()->getRepository("project")->getElementFromId($projectId);

        return $project;
    }



    public function renderProjectPage($projectId)
    {
        try{

            $project = $this->getProjectFromId($projectId);
            $projectStatus = $project->getPropertyValue("status");
            $actions = $this->getSuperOrm()->getRepository("action")->getAllElementsFromProperty("project_id", $projectId);
            $totalAmount =  $project->getPropertyValue("total_amount");
            $paidAmount = $project->getPropertyValue("paid_amount");
            $leftAmount =$totalAmount - $paidAmount;


            if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){

                if($_SESSION["username"] == admin){
                    $admin = true;
                } else {
                    $admin = false;
                }

               return $this->renderPage( "admin/projects/seeProject" , ["project" =>  $project, "totalAmount" => $totalAmount , "paidAmount" => $paidAmount, "leftAmount" => $leftAmount, "actions" => $actions , "projectStatus" => $projectStatus, "admin" => $admin]);
    
            } else {

                echo "vous n'avez pas accès à cette page";

            }

        } catch(Exception $e)
        {
            echo $e->getMessage();
        }
 
    }



    public function renderAllProjectsPage() : Response
    {
        $pendingProjects = $this->getSuperOrm()->getRepository("project")->getAllElementsFromPropertySortedBy("status", "pending", "name", "ASC");
        $doneProjects = $this->getSuperOrm()->getRepository("project")->getAllElementsFromPropertySortedBy("status", "done", "name", "ASC");
         
        return $this->renderPage("admin/projects/all", ["pendingProjects" => $pendingProjects , "doneProjects" => $doneProjects]);
    }

    public function renderProjectCreationPage() : Response
    {
         return $this->renderPage("admin/projects/new", []);
    }

    public function getProjectsPerUser($userId) : array
    {
        $projects = $this->getSuperOrm()->getRepository("project")->getAllElementsFromProperty("user_id", $userId);

        return $projects;

    }


    public function getProjectsMatchingString($projectString) : JsonResponse
    {

         $projects = $this->getSuperOrm()->getRepository("project")->getAllElementsWherePropertyLike("name" , $projectString);

         //find all projects with a starting by ...

         $projectNames = [];

         /*

         foreach($projects as $project){

            $projectNames[] = $project->getPropertyValue("name");

         }

         */

         

         return new JsonResponse(["projects" => $projectNames ]);

    }


}