<?php

namespace RowInterface;


interface RowInterface
{
    public function insertRow(string $columns, $value);
    public function getRowFromId(string $id);
    public function updateRowFromId(string $id, $value);
    public function removeRowFromId(string $columns, $value);

}