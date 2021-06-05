<?php

 namespace App\controllers;

 require_once 'src/autoload.php';

 use App\controllers\abstractClass\AbstractController;
 use App\component\httpComponent\Response;
 use App\model\entities\Entity;


 require_once "src/services/database/entityManager.php";


class PaymentController extends AbstractController
{

     public function renderPaymentPage(int $amount) : Response
     {
          return $this->renderPage( "cart/payment" ,["amount" => $amount ]);

     }



     public function pay()
     {

          
     }


     public function renderSuccesfulPaymentPage() : Response
     {
          return new Response("succesful payment");
     }


     public function renderCanceledPaymentPage() : Response
     {
          return new Response("canceled payment");
     }
     

}
