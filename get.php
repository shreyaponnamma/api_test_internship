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
        <input type="text" value="" id="ip1" name="id" class="block border-none p0 m0" placeholder="Enter id">
        <label for="ip1" class="absolute top-0 right-0 bottom-0 left-0" aria-hidden="true">Enter id to read</label>
    </div>

    <button class="ampstart-btn ampstart-btn-secondary">
  SUBMIT
    </button>
</form>
    

<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') {
    $url = 'http://localhost/api_test/read.php';
    $id = $_POST["id"];
    $request_url = $url . '?id=' . $id;
    $curl = curl_init($request_url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $response = curl_exec($curl);
    curl_close($curl);
    echo $response . PHP_EOL;
}
?>

</body>
</html>