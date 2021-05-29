<?php

require "src/autoload.php";

use PHPUnit\Framework\TestCase;
use App\controllers\FrontController;
use App\model\orm\SuperOrm;
use App\Model\entities\EntityManager;




class ControllerTest extends TestCase
{
    /**
     * @test
     */

    public function CanIreachController()
    {
        
        $controller = new FrontController();
        $this->assertInstanceOf(FrontController::class, $controller);

    }



    
    /**
     * @test
    */



    
    public function canIinsertEntity()
    {
        $controller = new FrontController();
        $controller->insertArticle();
        
    }




}