<?php

 namespace App\controllers;

 require_once 'src/autoload.php';

 use App\controllers\abstractClass\AbstractController;
 use App\component\httpComponent\Response;
 use App\model\entities\Entity;


 require_once "src/services/database/entityManager.php";




class ChatController extends AbstractController
{


    public function displayChat() : Response
    {

        if(isset($_SESSION["loggedIn"]) == true && $_SESSION["loggedIn"])
        {
            if($_SESSION["username"] == admin)
            {
                return $this->renderPage( "admin/chat/seeChat", []);

            } else {
                  
                return $this->renderPage( "user/chat/seeChat" , []);
            }

        } else {

            echo "sorry, you can't access this page";

        }

    }



}