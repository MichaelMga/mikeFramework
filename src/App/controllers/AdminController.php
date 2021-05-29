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
        global $users;

        $users = $this->getSuperOrm()->getRepository("user")->getAll();
        
        return $this->renderPage("admin/seeUsers");

    }

}