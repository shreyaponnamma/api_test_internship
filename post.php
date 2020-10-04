<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="POST">
        <input name='title' type='text'>
        <input name='body' type='text'>
        <input name='author' type='text'>
        <input name='submit' type='submit'>
</form>


<?php
require 'config.php';
$db_conn = new Database();
$conn = $db_conn->dbConnection();


if($_SERVER['REQUEST_METHOD'] == 'POST') {

    $title = $_POST["title"];
    $body = $_POST["body"];
    $author = $_POST["author"];

$url = 'http://localhost/api_test/insert.php';




$data = array(
'title' => $title,
'body' => $body,
'author' => $author
);
 



$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);


curl_setopt($curl, CURLOPT_POST, true);

curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));


$response = curl_exec($curl);
curl_close($curl);

echo $response . PHP_EOL;
}
?>
</body>
</html>