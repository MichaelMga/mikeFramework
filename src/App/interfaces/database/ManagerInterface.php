<?php

 class ManagerInterface
 {
    public function add();
    public function getFromId(string $id);
    public function updateFromId(string $id, $oldValue , $newValue);
    public function deleteFromId(string $id);

 }