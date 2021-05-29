<?php

 namespace App\Component\HttpComponent;


 class Response
 {


    private $content;
    private $statusCode;
    private $headers = [];



   public function __construct(string $content)
   {

        $this->content = $content;

   }



   public function setStatusCode(int $statusCode){

       $this->statusCode = $statusCode;

   }


   public function addHeader(string $key, string $value){

    $this->headers[] = "$key => $value";

  }


  
  public function getStatusCode(int $statusCode){

    return $this->statusCode;

}


   public function getHeaders(int $statusCode){

        return $this->statusCode;
   }



   public function send()
   {

     foreach($this->headers as $key => $value){

        header($key,$value);

     }


     echo $this->content;

   }



 }