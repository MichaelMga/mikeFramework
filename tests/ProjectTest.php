<?php

require "src/autoload.php";

use PHPUnit\Framework\TestCase;
use App\controllers\FrontController;
use App\controllers\ProjectController;
use App\model\orm\SuperOrm;
use App\model\database\table\handlers\RowHandler;
use App\model\entities\Repository;






class ProjectTest extends TestCase
{
 
    /**
     * @test
     */

     public function canIreachController()
     {

        $controller = new ProjectController();
        
        $this->assertInstanceOf( ProjectController::class , $controller);

     }



    /**
     * @test
     */
     
     public function canIcreateAproject()
     {

      
        $controller = new ProjectController();
        $controller->createProject("first_project", 1);



     }
 

}



