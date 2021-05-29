<?php

  require_once "src/autoload.php";

  use App\model\tests\TestHandler;


  
  $testHandler = new TestHandler();

  $existingTest = readline("do you want to update an existing test? (y or n):");

   if($existingTest == "y"){

     $testedElement = readline("search for a test with the name :");
 
     $testHandler->updateTest($existingTest);

  } else  if($existingTest == "n"){       

    $newlyTestedElement = readline("what's the name of the element you want to test :");

    $path = readline("Create a path for the element to create (from the test folder) => exemple => /myFolder will build a test in the folder tests/myFolder : ");
 
    $testHandler->createTest($newlyTestedElement);

 } else {

     echo "please type either y or n";
 }


