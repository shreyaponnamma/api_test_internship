<?php

$url = 'http://localhost/api_test/update.php';


$data = array(
   'id' => 2, 
  'author' => 'shreya'
);

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));

$response = curl_exec($curl);
curl_close($curl);

echo $response . PHP_EOL;