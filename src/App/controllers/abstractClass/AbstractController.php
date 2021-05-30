<?php

namespace App\controllers\abstractClass; 
use App\Component\HttpComponent\Response;
use App\model\orm\SuperOrm;

require_once "src/services/database/entityManager.php";


abstract class AbstractController
{

   public function getSuperOrm()
   {
      return new SuperOrm();
   }


   public function renderHome() : Response
   {

      include "templates/base.php";

      if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){

         ob_start();

          if($_SESSION["username"] == admin){

            include "templates/admin/index.php";

          } else {
            
            $username = $_SESSION["username"];
            include "templates/user/index.php";   

          }   

       } else {
           include "templates/home.php";
       }



       $content = ob_get_clean();
       return new Response($content);

   }   


   public function renderPage($page) : Response
   {

      ob_start();
      include "templates/base.php";
      include "templates/$page.php";

      $content = ob_get_clean();
      return new Response($content);

   }   




   public function getEntityManager(){

       global $entityManager;

       return $entityManager;

   }

}