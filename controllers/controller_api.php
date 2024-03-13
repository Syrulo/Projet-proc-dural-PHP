<?php
// ma logique de controller
$db = Utils::connectDB();
$posts = [];
if ($db){
    $sql = $db->prepare("SELECT *,post.created_at as datepost,post.id as post_id FROM post LEFT JOIN contact on post.user_id = contact.user_id ORDER BY post.id DESC");
    $sql->execute();
    // echo "<pre>";
    $posts =  $sql->fetchAll(PDO::FETCH_ASSOC);
    // var_dump( $posts );
}
// Permet de transformer les données récupérées en fichier json utilisable ailleurs.
header('content-type:application/json');
echo json_encode($posts);
