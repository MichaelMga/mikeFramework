<?php
 
 namespace App\interfaces\database\TableInterface;


 interface TableInterface
 {
     //CRUD
     
    public function addColumn(string $column, string $columnType);
    public function getColumn(string $column);
    public function updateColumnName(string $column, string $newName);
    public function updateColumnType(string $column, string $newName);
    public function removeColumn(string $column);

 }