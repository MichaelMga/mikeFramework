<?php

 namespace App\controllers;

 require_once 'src/autoload.php';

 use App\controllers\abstractClass\AbstractController;
 use App\component\httpComponent\Response;
 use App\model\entities\Entity;
 use App\model\payment\Stripe;


 require_once "src/services/database/entityManager.php";


class PaymentController extends AbstractController
{

     public function renderPaymentPage(int $amount) : Response
     {
          return $this->renderPage( "cart/payment" ,["amount" => $amount ]);

     }



     public function pay($token, $email, $name, $amount) : Response
     {  
                  
         if(filter_var($email, FILTER_VALIDATE_EMAIL) && !empty($name) && !empty($token)){
         
         
          $stripe = new Stripe('sk_test_51IxbD8AxhkbQXqSAWWzfHf3gwc0d9Oj6ziEBgpcAOGuCVoMhHxshIfLURANm8nwv2ppRMAHNfAlsKY4CX4kXg7VO00t1CFJRoT');
         
            $customer = $stripe->api('customers', [
              'source' => $token,
              'description' => $name,
              'email' => $email
             ]);
         
         
         
         //Charge the client
         
         
           $stripe->api('charges', [
         
              'amount' => $amount,
              'currency' => 'eur',
              'customer' => $customer->id]);
         
           };
         
         
           $error = $stripe->error;
         
            if($error != null){

                 return new Response($error);

           }
            

          return new Response("payment ok");
          
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
