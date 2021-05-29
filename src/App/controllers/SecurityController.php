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

}