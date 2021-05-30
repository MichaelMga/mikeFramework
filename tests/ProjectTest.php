<?php

require "src/autoload.php";

use PHPUnit\Framework\TestCase;
use App\controllers\FrontController;
use App\controllers\ProjectController;
use App\model\orm\SuperOrm;
use App\model\database\table\handlers\RowHandler;
use App\model\entities\Repository;
use App\model\entities\Entity;




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
      
        //$controller = new ProjectController();
       // $controller->createProject("first_project", 8);
        

     }


    /**
     * @test
     */
     
    public function canIgetProject()
    {

        $controller = new ProjectController();
     
        $project = $controller->getProjectFromId(4);

        $this->assertInstanceOf(Entity::class , $project);

     }



     /**
     * @test
     */
     
    public function canIgetProjectPerUser()
    {
        $controller = new ProjectController();
        $projects = $controller->getProjectsPerUser(8);
     }





 

}



