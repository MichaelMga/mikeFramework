<?php

require "src/autoload.php";

use PHPUnit\Framework\TestCase;
use App\controllers\FrontController;
use App\controllers\ProjectController;
use App\controllers\AdminController;
use App\controllers\ActionController;
use App\model\orm\SuperOrm;
use App\model\database\table\handlers\RowHandler;
use App\model\entities\Repository;
use App\model\entities\Entity;




class ActionTest extends TestCase
{
 

    /**
     * @test
     */

     public function canIgetActionController()
     {
        $controller = new ActionController();
        $this->assertInstanceOf(ActionController::class, $controller);

     }


    /**
     * @test
     */

    public function canIcreateAction()
    {
       $actionController = new ActionController();
       $projectId = 8;
       $name = "my action";
       $actionController->createAction($projectId, $name);

    }


    /**
     * @test
     */

    public function canIremoveAction()
    {
       //$actionController = new ActionController();
       //$actionId = 1;
       //$actionController->removeAction($actionId);

    }



     /**
     * @test
     */

    public function canIupdateAction()
    {
       $actionController = new ActionController();
       $actionId = 2;
       $actionController->updateActionName($actionId, "newName");

    }


}