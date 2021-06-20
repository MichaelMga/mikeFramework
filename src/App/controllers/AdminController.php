<?php

 namespace App\controllers;

 require_once 'src/autoload.php';

 use App\controllers\abstractClass\AbstractController;
 use App\component\httpComponent\Response;
 use App\model\entities\Entity;

 

 require_once "src/services/database/entityManager.php";


 class AdminController extends AbstractController
 {
    public function seeUsers() : Response
    {
        $users = $this->getSuperOrm()->getRepository("user")->getAllSortedy("username", "ASC");
        $projects = $this->getSuperOrm()->getRepository("project")->getAll();
        $usernum = count($users);


        $cashCollected = 0;
        $totalRequiredCash = 0;
        $pendingProjects = 0;
        $doneProjects = 0;


        foreach($projects as $project){

            $cashCollected += $project->getPropertyValue("paid_amount");
            $totalRequiredCash +=  $project->getPropertyValue("total_amount");

            $projectStatus = $project->getPropertyValue("status");

            if($projectStatus == "done"){

                $doneProjects += 1;
            
            } else if($projectStatus == "pending") {

                $pendingProjects += 1;
            }



        }

 

        $cashDue = $totalRequiredCash - $cashCollected;
        
        return $this->renderPage("admin/seeUsers", ["users" => $users, "cashCollected" => $cashCollected , "cashDue" =>   $cashDue , "usernum" =>   $usernum , "doneProjects" =>  $doneProjects , "pendingProjects" => $pendingProjects]);
    }

     public function seeUser($userId) : Response
     {

            $user = $this->getSuperOrm()->getRepository("user")->getElementFromId($userId);
            $pendingProjects = $this->getSuperOrm()->getRepository("project")->getAllElementsFromProperties(["user_id" => $userId, "status" => "pending" ]);
            $waitingPaymentProjects = $this->getSuperOrm()->getRepository("project")->getAllElementsFromProperties(["user_id" => $userId, "status" => "waitingPayment" ]);
            $doneProjects = $this->getSuperOrm()->getRepository("project")->getAllElementsFromProperties(["user_id" => $userId, "status" => "done" ]);
            

            return $this->renderPage("admin/seeUser", ["user" => $user , "pendingProjects" =>  $pendingProjects , "waitingPaymentProjects" => $waitingPaymentProjects ,  "doneProjects" => $doneProjects ]);
    
    }
    

}