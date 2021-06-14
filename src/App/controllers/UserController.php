<?php

 namespace App\controllers;

 require_once 'src/autoload.php';

 use App\controllers\abstractClass\AbstractController;
 use App\component\httpComponent\Response;
 use App\component\httpComponent\JsonResponse;
 use App\model\entities\Entity;


 require_once "src/services/database/entityManager.php";




class UserController extends AbstractController
{

    public function seeUser($userId) : Response
    {
        $user = $this->getSuperOrm()->getRepository("user")->getElementFromId($userId);
        $pendingProjects = $this->getSuperOrm()->getRepository("project")->getAllElementsFromProperties(["user_id" => $userId, "status" => "pending" ]);
        $waitingPaymentProjects = $this->getSuperOrm()->getRepository("project")->getAllElementsFromProperties(["user_id" => $userId, "status" => "waitingPayment" ]);
        $doneProjects = $this->getSuperOrm()->getRepository("project")->getAllElementsFromProperties(["user_id" => $userId, "status" => "done" ]);
        
          
        return $this->renderPage("admin/seeUser", ["user" => $user , "pendingProjects" =>  $pendingProjects , "waitingPaymentProjects" => $waitingPaymentProjects ,  "doneProjects" => $doneProjects ]);
   }


   public function getUserFromName(string $userName) 
   {
     try{
         $user = $this->getSuperOrm()->getRepository("user")->getElementFromProperty("username",$userName);

        return $user;

     } catch (Exception $e)
     {
        echo $e->getMessage();
     }

   }



   public function getUserFromNameAsync(string $userName) : JsonResponse
    {
      $user = $this->getUserFromName($userName);

      if($user != false){

        $username = $user->getPropertyValue("username");
        $userId =  $user->getPropertyValue("ID");

      } else {

        $username = false;
        $userId = false;
        
      }

      return new JsonResponse(["user" => $username, "userId" => $userId]);
   }


   
   public function getUserForLoginAsync(string $userName, $password) : JsonResponse
    {
      $user = $this->getSuperOrm()->getRepository("user")->getElementFromProperty("username", $userName);

      if($user != false)
      {
          $hash = $user->getPropertyValue("hash");
         
           if( password_verify($password , $hash)){

              return new JsonResponse(["user" => $userName]);

          } else {
              return new JsonResponse(["user" => false]);
           };

      } else {

        return new JsonResponse(["user" => false]);
      }

   }





}