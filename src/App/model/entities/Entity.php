<?php

 namespace App\model\entities;

 class Entity
 {
    private $name;
    private $propertiesAndValues = [];


    public function __construct(){


    }


    public function getPropertyValue($property)
    {
        return $this->propertiesAndValues[$property];   
    }

    
    public function setProperty($property, $value)
    {
        $this->propertiesAndValues[$property] = $value;
    }


    public function getPropertiesAndValues()
    {
        return $this->propertiesAndValues;      
    }


    
 }