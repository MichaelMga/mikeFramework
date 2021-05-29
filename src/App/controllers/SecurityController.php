<?php

 namespace App\controllers;

 require_once 'src/autoload.php';

 use App\controllers\abstractClass\AbstractController;
 use App\component\httpComponent\Response;
 use App\model\entities\Entity;


 require_once "src/services/database/entityManager.php";




class SecurityController extends AbstractController
{

    public function tryToLoginUser($username, $password) : Response
    {

        return new Response("trying to log $username");

    }



    public function tryToRegisterUser($username, $password) : Response
    {

        $entityManager = $this->getEntityManager();


        $user = new Entity();

        $user->setProperty("table", "user");
        $user->setProperty("username", $username);
        $user->setProperty("pass", $username);
        $user->setProperty("ID", 0);

        $entityManager->insert($user);

      
        return new Response("we just registered $username");

        
    }

}