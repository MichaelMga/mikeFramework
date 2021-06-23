<?php

 namespace App\controllers;

 require_once 'src/autoload.php';

 use App\controllers\abstractClass\AbstractController;
 use App\component\httpComponent\Response;
 use App\model\entities\Entity;


 require_once "src/services/database/entityManager.php";




class FrontController extends AbstractController
{



    public function displayPage($page, $array) : Response
    {
        return $this->renderPage($page, $array);
    }

    


}