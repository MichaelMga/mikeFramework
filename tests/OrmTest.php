<?php

require "src/autoload.php";

use PHPUnit\Framework\TestCase;
use App\controllers\FrontController;
use App\model\orm\SuperOrm;
use App\model\database\TableHandler;
use App\model\database\table\Table;
use App\model\database\table\handlers\RowHandler;
use App\model\entities\Repository;






class OrmTest extends TestCase
{
    /**
     * @test
     */

    public function canIgetRowHandler()
    {

        $controller = new FrontController();
        $superOrm = $controller->getSuperOrm();
        $repository = $superOrm->getRepository("controllers");
    
        $this->assertInstanceOf(Repository::class, $repository);

    }

}