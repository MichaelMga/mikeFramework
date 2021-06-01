<?php

 namespace App\controllers;

 require_once 'src/autoload.php';

 use App\controllers\abstractClass\AbstractController;
 use App\component\httpComponent\Response;
 use App\model\entities\Entity;


 require_once "src/services/database/entityManager.php";




class ActionController extends AbstractController
{


      public function createAction(int $projectId, string $name) : void
      {

          $action = new Entity();

          $action->setProperty("table", "action");
          $action->setProperty("name", $name);
          $action->setProperty("project_id", $projectId);
          $action->setProperty("status", "pendingAction");
          $action->setProperty("ID", 0);

          $this->getEntityManager()->insert($action);


          header("Location:" . rootUrl . "project?id= $projectId");
          

      }



      public function updateActionName(int $actionId, string $newName) : void
      {
         
          $action = $this->getSuperOrm()->getRepository("action")->getElementFromId($actionId);

          $action->setProperty("name", $newName);

          $this->getEntityManager()->insert($action);

      }


      public function removeAction(int $actionId) : void
      {

          $action = $this->getSuperOrm()->getRepository("action")->getElementFromId($actionId);

          $this->getEntityManager()->remove($action);

      }



}