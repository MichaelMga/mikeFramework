<?php

require "src/autoload.php";

use PHPUnit\Framework\TestCase;
use App\controllers\FrontController;
use App\controllers\ProjectController;
use App\controllers\AdminController;
use App\model\orm\SuperOrm;
use App\model\database\table\handlers\RowHandler;
use App\model\entities\Repository;
use App\model\entities\Entity;




class AdminTest extends TestCase
{
 

    /**
     * @test
     */

     public function canIseeUser()
     {
        $controller = new AdminController();

        $controller->seeUser(8);


     }


}