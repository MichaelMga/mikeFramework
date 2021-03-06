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

      ob_start();

      include "templates/base.php";

      if(isset($_SESSION["loggedIn"]) && $_SESSION["loggedIn"] == true){

          if($_SESSION["username"] == admin){

            header("Location:" . rootUrl . "users" );

          } else {
             header("Location:" . rootUrl . "user?id=" . $_SESSION["user_id"] );
          }   

       } else {

            header("Location:" . rootUrl . "login" );

       }



       $content = ob_get_clean();
       return new Response($content);

   }   


   public function renderPage($page, $array=[]) : Response
   {

      extract($array);

      ob_start();
      include "templates/base.php";
      include "templates/$page.php";
      include "templates/footer.php";

      


      $content = ob_get_clean();
      return new Response($content);

   }   




   public function getEntityManager(){

       global $entityManager;

       return $entityManager;

   }

}