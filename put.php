<!doctype html>
<html ⚡ lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,minimum-scale=1,initial-scale=1">

    <link rel="canonical" href="/article.html">
    <link rel="shortcut icon" href="amp_favicon.png">

    <title>Api</title>

    <style amp-boilerplate>body{-webkit-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-moz-animation:-amp-start 8s steps(1,end) 0s 1 normal both;-ms-animation:-amp-start 8s steps(1,end) 0s 1 normal both;animation:-amp-start 8s steps(1,end) 0s 1 normal both}@-webkit-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-moz-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-ms-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@-o-keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}@keyframes -amp-start{from{visibility:hidden}to{visibility:visible}}</style><noscript><style amp-boilerplate>body{-webkit-animation:none;-moz-animation:none;-ms-animation:none;animation:none}</style></noscript>

    <script async src="https://cdn.ampproject.org/v0.js"></script>
  </head>
  <body>
  <form action="" method="POST">
  <div class="ampstart-input inline-block relative m0 p0 mb3 ">
        <input type="text" value="" id="ip4" name="id" class="block border-none p0 m0" placeholder="Enter id">
        <label for="ip4" class="absolute top-0 right-0 bottom-0 left-0" aria-hidden="true">Enter id</label>
    </div>
    <div class="ampstart-input inline-block relative m0 p0 mb3 ">
        <input type="text" value="" id="ip1" name="title" class="block border-none p0 m0" placeholder="Enter title">
        <label for="ip1" class="absolute top-0 right-0 bottom-0 left-0" aria-hidden="true">Enter Title</label>
    </div>
    <div class="ampstart-input inline-block relative m0 p0 mb3 ">
        <input type="text" value="" id="ip2" name="body" class="block border-none p0 m0" placeholder="Enter body">
        <label for="ip2" class="absolute top-0 right-0 bottom-0 left-0" aria-hidden="true">Enter Body</label>
    </div>
    <div class="ampstart-input inline-block relative m0 p0 mb3 ">
        <input type="text" value="" id="ip3" name="author" class="block border-none p0 m0" placeholder="Enter author">
        <label for="ip3" class="absolute top-0 right-0 bottom-0 left-0" aria-hidden="true">Enter author</label>
    </div>
    <button class="ampstart-btn ampstart-btn-secondary">
  SUBMIT
    </button>
</form>

<?php
if($_SERVER['REQUEST_METHOD'] == 'POST') {

  $id = $_POST["id"];
  $title = $_POST["title"];
  $body = $_POST["body"];
  $author = $_POST["author"];

$url = 'http://localhost/api_test/update.php';


$data = array(
  'id' => $id,
  'title' => $title,
  'body' => $body,
  'author' => $author
  );

$curl = curl_init($url);

curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'PUT');
curl_setopt($curl, CURLOPT_POSTFIELDS,  json_encode($data));

$response = curl_exec($curl);
curl_close($curl);

echo $response . PHP_EOL;
}
?>