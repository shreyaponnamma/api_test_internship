<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: PUT");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


require 'config.php';
$db_connection = new Database();
$conn = $db_connection->dbConnection();


$data = json_decode(file_get_contents("php://input"));

if(isset($data->id)){
    
    $msg['message'] = '';
    $post_id = $data->id;
    
   
    $get_post = "SELECT * FROM `blogs` WHERE id=:post_id";
    $get_stmt = $conn->prepare($get_post);
    $get_stmt->bindValue(':post_id', $post_id,PDO::PARAM_INT);
    $get_stmt->execute();

    if($get_stmt->rowCount() > 0){
        
        
        $row = $get_stmt->fetch(PDO::FETCH_ASSOC);
        
        
        $post_title = isset($data->title) ? $data->title : $row['title'];
        $post_body = isset($data->body) ? $data->body : $row['body'];
        $post_author = isset($data->author) ? $data->author : $row['author'];
        
        $update_query = "UPDATE `blogs` SET title = :title, body = :body, author = :author 
        WHERE id = :id";
        
        $update_stmt = $conn->prepare($update_query);
        
        $update_stmt->bindValue(':title', htmlspecialchars(strip_tags($post_title)),PDO::PARAM_STR);
        $update_stmt->bindValue(':body', htmlspecialchars(strip_tags($post_body)),PDO::PARAM_STR);
        $update_stmt->bindValue(':author', htmlspecialchars(strip_tags($post_author)),PDO::PARAM_STR);
        $update_stmt->bindValue(':id', $post_id,PDO::PARAM_INT);
        
        
        if($update_stmt->execute()){
            $msg['message'] = 'Updated successfully';
        }else{
            $msg['message'] = 'Not updated';
        }   
        
    }
    else{
        $msg['message'] = 'Invlid ID';
    }  
    
    echo  json_encode($msg);
    
}
?>