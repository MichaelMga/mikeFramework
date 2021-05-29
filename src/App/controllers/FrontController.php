<?php

 namespace App\controllers;

 require_once 'src/autoload.php';

 use App\controllers\abstractClass\AbstractController;
 use App\component\httpComponent\Response;
 use App\model\entities\Entity;


 require_once "src/services/database/entityManager.php";




class FrontController extends AbstractController
{

    public function displayHome()
    {
        return $this->renderHome();

    }
 
    public function displaySection($section) : Response
    {
        return $this->renderSection($section);

    }


    
    public function displaySubSection($section , $subsection) : Response
    {
        return $this->renderSubsection($section,  $subsection);

    }


    public function displayPage($page) : Response
    {
        return $this->renderPage($page);
    }

    
    public function insertArticle()
    {
        $article = $this->getSuperOrm()->getRepository("controllers")->getElementFromId(1);

        $entity = new Entity();

        $entity->setProperty("table", "controllers");
        $entity->setProperty("name", "myXXcontroller");
        $entity->setProperty("ID", 0);


        if($article != false)
        {
            global $entityManager;   
            $entityManager->insert($article);

        }
      
    }


    public function getArticle(int $id)
    {
       $article = $this->getSuperOrm()->getRepository("controllers")->getElementFromId($id);
        
       return $article;

    }

    


}