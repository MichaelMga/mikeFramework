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
        $users = $this->getSuperOrm()->getRepository("user")->getAll();
        
        return $this->renderPage("admin/seeUsers", ["users" => $users]);

    }

     public function seeUser($userId) : Response
     {

            $user = $this->getSuperOrm()->getRepository("user")->getElementFromId($userId);

            $pendingProjects = $this->getSuperOrm()->getRepository("project")->getAllElementsFromProperties(["user_id" => $userId]);

            $waitingPaymentProjects;

            $doneProjects;
            
            return $this->renderPage("admin/seeUser", ["user" => $user , "pendingProjects" => ["réparation tuyau", "rebouchage evier"] , "waitingPaymentProjects" => ["nettoyage douche"] ,  "doneProjects" => ["réparation laverie", "rebouchage machine"] ]);
    
    }

}