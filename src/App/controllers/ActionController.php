<?php

 namespace App\controllers;

 require_once 'src/autoload.php';

 use App\controllers\abstractClass\AbstractController;
 use App\component\httpComponent\Response;
 use App\model\entities\Entity;


 require_once "src/services/database/entityManager.php";




class ActionController extends AbstractController
{


      public function createAction($projectId, $name)
      {

          $action = new Entity();

          $action->setProperty("table", "action");
          $action->setProperty("name", $name);
          $action->setProperty("status", "pendingAction");
          $action->setProperty("ID", 0);

          $this->getEntityManager()->insert($action);

      }


}