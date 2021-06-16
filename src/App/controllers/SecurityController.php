<?php

 namespace App\controllers;

 require_once 'src/autoload.php';

 use App\controllers\abstractClass\AbstractController;
 use App\component\httpComponent\Response;
 use App\component\httpComponent\JsonResponse;
 use App\model\entities\Entity;


 require_once "src/services/database/entityManager.php";




class SecurityController extends AbstractController
{

    public function tryToLoginUser($username, $password)
    {
        $user = $this->getSuperOrm()->getRepository("user")->getElementFromProperty("username", $username);

        if($user != false)
        {
            $hash = $user->getPropertyValue("hash");
           
             if( password_verify($password , $hash)){

                //session
                
                $_SESSION["loggedIn"] = true;
                $_SESSION["username"] = $username;
                $_SESSION["user_id"] = $user->getPropertyValue("ID"); 
      

                header("Location:" . rootUrl );

            } else {
                echo "wrong password";
             };

        } else {

            echo "sorry, we didn't find this user";
        }

    }


    public function tryToRegisterUser($username, $password) : Response
    {

        $entityManager = $this->getEntityManager();

        $user = new Entity();

        $user->setProperty("table", "user");
        $user->setProperty("username", $username);
        $user->setProperty("hash", password_hash($password, PASSWORD_DEFAULT));
        $user->setProperty("firstPayment", "true");
        $user->setProperty("paymentId", "none");
        $user->setProperty("ID", 0);

        $entityManager->insert($user);

        return new Response("we just registered $username");
        
    }





    public function checkAvailableUsername(string $username) : JsonResponse
    {
        $availableUser = true;

        $user = $this->getSuperOrm()->getRepository("user")->getElementFromProperty("username", $username);

        
        if($user != false){

            $availableUser = "none";

        }

        return new JsonResponse(["availableUser" => $availableUser ]);
    
    }




    public function checkAvailableMail(string $mail) : JsonResponse
    {
        $availableMail = true;

        $availableMail = $this->getSuperOrm()->getRepository("user")->getElementFromProperty("mail", $mail);

        
        if($availableMail != false){

            $availableMail = "none";

        } else {

            $availableMail = true;

        }


        return new JsonResponse(["availableMail" => $availableMail ]);

    }







    public function logout()
    {
        session_destroy();

        header("Location:" . rootUrl );

    }



    public function renderForgottenPassForm() : Response
    {

             return $this->renderPage("admin/login/resetPassword");


    }


    

}