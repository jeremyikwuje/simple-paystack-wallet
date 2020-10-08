<?php 

$result = array();
// Pass the customer's authorisation code, email and amount
$postdata =  array( 'authorization_code' => 'AUTH_72btv547','email' => 'ikwuje@gmail.com', 'amount' => 500000);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"https://api.paystack.co/transaction/charge_authorization");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS,json_encode($postdata));  //Post Fields
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$headers = [
  'Authorization: Bearer SECRET_KEY',
  'Content-Type: application/json',
];

curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);

$request = curl_exec ($ch);

curl_close ($ch);
if ($request) {
  $result = json_decode($request, true);
}