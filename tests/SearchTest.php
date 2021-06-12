<?php

require "src/autoload.php";

use PHPUnit\Framework\TestCase;
use App\controllers\FrontController;
use App\controllers\ProjectController;
use App\controllers\AdminController;
use App\controllers\ActionController;
use App\component\httpComponent\Response;
use App\component\httpComponent\JsonResponse;
use App\model\orm\SuperOrm;
use App\model\database\table\handlers\RowHandler;
use App\model\entities\Repository;
use App\model\entities\Entity;



class SearchTest extends TestCase
{

    /**
     * @test
     **/

     public function doIgetJsonFromSearch()
     {

        $controller = new ProjectController();
        
        $results = $controller->getProjectsMatchingString("déb");
        

        $this->assertInstanceOf( JsonResponse::class, $results) ;

     }


         /**
     * @test
     **/

    public function canIsearchProject()
     {

       $controller = new ProjectController();
       
       $results = $controller->getProjectsMatchingString("déb")->send();

       $jsonObject = json_decode($results);

       //$projectsNames = json_decode($results);

    
       //$this->assertInstanceOf( JsonResponse::class, $results) ;

    }






}