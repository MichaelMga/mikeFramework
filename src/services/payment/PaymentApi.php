<?php

require 'vendor/autoload.php';

\Stripe\Stripe::setApiKey('sk_test_51IxbD8AxhkbQXqSAWWzfHf3gwc0d9Oj6ziEBgpcAOGuCVoMhHxshIfLURANm8nwv2ppRMAHNfAlsKY4CX4kXg7VO00t1CFJRoT');

header('Content-Type: application/json');

$checkout_session = \Stripe\Checkout\Session::create([
  'payment_method_types' => ['card'],
  'line_items' => [[
    'price_data' => [
      'currency' => 'usd',
      'unit_amount' => 2000
    ],
    'quantity' => 1,
  ]],
  'mode' => 'payment',
  'success_url' => rootUrl . '/successfulPayment',
  'cancel_url' => rootUrl . '/canceledPayment'
]);


echo json_encode(['id' => $checkout_session->id]);

