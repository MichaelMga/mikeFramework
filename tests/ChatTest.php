<?php

require "src/autoload.php";

use PHPUnit\Framework\TestCase;
use App\controllers\FrontController;
use App\controllers\ProjectController;
use App\controllers\AdminController;
use App\controllers\ChatController;
use App\model\orm\SuperOrm;
use App\model\database\table\handlers\RowHandler;
use App\model\entities\Repository;
use App\model\entities\Entity;




class ChatTest extends TestCase
{
    /**
     * @test
     */

    public function accessChatController()
    {

        $controller = new ChatController();

        $this->assertInstanceOf(ChatController::class, $controller);

    }
 

}