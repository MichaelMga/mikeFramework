<?php

namespace App\interfaces\database;

interface DbConnectionInterface
{

    public function connect($dbName);

}