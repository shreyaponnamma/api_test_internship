<?php

header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Headers: access");
header("Access-Control-Allow-Methods: GET");
header("Access-Control-Allow-Credentials: true");
header("Content-Type: application/json; charset=UTF-8");


require 'config.php';
$db_connection = new Database();
$conn = $db_connection->dbConnection();


if(isset($_POST['id']))
{
    
    $post_id = filter_var($_POST['id'], FILTER_VALIDATE_INT,[
        'options' => [
            'default' => 'all_posts',
            'min_range' => 1
        ]
    ]);
}
else{
    $post_id = 'all_posts';
}

$sql = is_numeric($post_id) ? "SELECT * FROM `blogs` WHERE id='$post_id'" : "SELECT * FROM `blogs`"; 

$stmt = $conn->prepare($sql);

$stmt->execute();

if($stmt->rowCount() > 0){
    $posts_array = [];
    while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $post_data = [
            'id' => $row['id'],
            'title' => $row['title'],
            'body' => html_entity_decode($row['body']),
            'author' => $row['author']
        ];
        
        array_push($posts_array, $post_data);
    }
    echo json_encode($posts_array);
 

}
else{
    echo json_encode(['message'=>'No found']);
}
?>