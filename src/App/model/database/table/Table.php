<?php

  namespace App\model\database\Table;

  use App\model\database\TableHandler;
  use App\model\database\table\handlers\ColumnHandler;
  use App\model\database\table\handlers\RowHandler;

  
  class Table{
    
    private $conn;
    private $name;

      //columns

    public function __construct($conn, string $name)
    {
       $this->conn = $conn;
       $this->name = $name;
       $this->validateTableExistence();
    }


    public function getColumnHandler(): ColumnHandler
    {
        return new ColumnHandler($this->conn, $this->name);
    }


    public function getRowHandler(): RowHandler 
    {
        return new RowHandler($this->conn, $this->name);
    }


    public function validateTableExistence()
    {
        try{
         
          $tableHandler = new TableHandler($this->conn, $this->name);
          $tableHandler->findTable($this->name);

        } catch (PDOException $e){

           echo $e->getMessage();

       }


    }

    
 }