<?php
 
 namespace App\Component\HttpComponent;

 class JsonResponse extends Response
 {

      public function __construct(array $data)
      {
          try {

              $this->content = json_encode($data);

          } catch (\Exception $e) {

            echo $e->getMessage();
          }

      }


      public function send()
      {

          echo $this->content;
        
      }




}