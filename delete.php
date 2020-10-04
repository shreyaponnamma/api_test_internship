<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="" method="POST">
        <input name='id' type='text' placeholder="enter id">
        <input name='submit' type='submit'>
    
</form>
    


<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {

$id = $_POST["id"];

$url = 'http://localhost/api_test/del.php';

$data = array(
    'id' => $id
);
$curl = curl_init($url);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'DELETE');
curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));

$response = curl_exec($curl);
curl_close($curl);
echo $response . PHP_EOL;
}

?>
</body>
</html>