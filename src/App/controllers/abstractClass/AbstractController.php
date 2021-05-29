<?php

namespace App\controllers\abstractClass; 
use App\Component\HttpComponent\Response;
use App\model\orm\SuperOrm;


abstract class AbstractController
{

   public function getSuperOrm()
   {
      return new SuperOrm();
   }


   public function renderHome() : Response
   {
      include "templates/base.php";

      return new Response(file_get_contents("templates/home.php"));

   }   



   public function renderPage($section, $subsection, $page) : Response
   {

      include "templates/base.php";

      return new Response(file_get_contents("templates/$section/$subsection/$page.php"));

   }   


   public function renderSection($section) : Response
   {
      
      include "templates/base.php";
   
      return new Response(file_get_contents("templates/$section/index.php"));
  
   }


   

   public function renderSubSection($section, $subsection) : Response
   {  
      include "templates/base.php";

      return new Response(file_get_contents("templates/$section/$subsection/index.php"));
  
   }

}