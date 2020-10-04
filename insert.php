<?php

    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: access");
    header("Access-Control-Allow-Methods: POST");
    header("Content-Type: application/json; charset=UTF-8");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

    require 'config.php';
    $db_conn = new Database();
    $conn = $db_conn->dbConnection();

    $data = json_decode(file_get_contents("php://input"));

    $msg['message'] = '';

    if(isset($data->title) && isset($data->body) && isset($data->author)) {
        if(!empty($data->title) && !empty($data->body) && !empty($data->author)) {

            $insert = "INSERT INTO `blogs`(title,body,author) VALUES(:title,:body,:author)";
            $stmt = $conn->prepare($insert);

            $stmt->bindValue(':title', htmlspecialchars(strip_tags($data->title)),PDO::PARAM_STR);
            $stmt->bindValue(':body', htmlspecialchars(strip_tags($data->body)),PDO::PARAM_STR);
            $stmt->bindValue(':author', htmlspecialchars(strip_tags($data->author)),PDO::PARAM_STR);


            if($stmt->execute()){
                $msg['message'] = 'Data Inserted';
            }else{
                $msg['message'] = 'Not Inserted';
            } 
            
        }else {
            $msg['message'] = 'Empty field detected';
        }
    } else{
        $msg['message'] = 'Fill all the fields.';
    }
    
    echo  json_encode($msg);

?>