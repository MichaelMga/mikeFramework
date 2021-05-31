<?php
 
  namespace App\Component\HttpComponent;

  class Request
  {
     
     private $get;
     private $post;
     private $file;
     private $url;


     public function __construct($get, $post, $files, $url, $session){

        $this->get = $get;
        $this->post = $post;
        $this->file = $files;
        $this->url = $url;
        $this->session = $session;

     }


     public static function createFromSuperGlobals(){

        return new Static($_GET, $_POST, $_FILES, parse_url($_SERVER["REQUEST_URI"], PHP_URL_PATH) , $_SESSION);

     }

     

     public function getGet($param, $alternative){

        if(isset($this->get[$param])){

            return $this->get[$param];

        } else {

            return $alternative;
        }

     }


     
     public function getPost($param, $alternative){
   

      if(isset($this->post[$param])){

          return $this->post[$param];

      } else {

          return $alternative;
      }

   }


     public function getUrl(){

            return $this->url;

     }


     
     public function getSession(string $param){

      if(isset($this->session[$param]))
      {
         return $this->session[$param];

      } else {
         return false;
      }


    }


  }