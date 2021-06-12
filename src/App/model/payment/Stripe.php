<?php

namespace App\model\payment;


class Stripe
{

    private $id;


    private $apiKey;


    public $error = null;


    public function __construct(string $api_key){

           $this->api_key = $api_key;

      }

    public function api(string $endpoint, array $data){


        $ch = curl_init();

        curl_setopt_array($ch, [

            CURLOPT_URL => "https://api.stripe.com/v1/".$endpoint,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_USERPWD => $this->api_key,
            CURLOPT_HTTPAUTH => CURLAUTH_BASIC,
            CURLOPT_POSTFIELDS => http_build_query($data)

        ]);

        $response = json_decode(curl_exec($ch));

        curl_close($ch);

        
    if(property_exists($response, 'error')){

        $this->error = $response->error->message;
    }


        return $response;


    }



    public function getId(): ?int
    {
        return $this->id;
    }


}
