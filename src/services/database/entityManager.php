<?php

require_once 'src/services/database/dbConn.php';
use App\model\entities\EntityManager;

global $entityManager;

$entityManager = new EntityManager($conn);