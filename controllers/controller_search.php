<?php
// ma logique de controller
$db = Utils::connectDB();
$keywords = strip_tags(urldecode(trim($_GET['keywords'])));
$posts = [];
if ($db){
    $sql = $db->prepare("SELECT * FROM post WHERE title LIKE '%".$keywords."%' OR description LIKE '%".$keywords."%' OR image LIKE '%".$keywords."%' ORDER BY id");
    $sql->execute();
    // echo "<pre>";
    $posts =  $sql->fetchAll(PDO::FETCH_ASSOC);
    $sql = $db->prepare("SELECT * FROM commentaire WHERE commentaire LIKE '%".$keywords."%' ORDER BY id");
    $sql->execute();
    $comment =  $sql->fetchAll(PDO::FETCH_ASSOC);
}
// On charge la vue
include "./views/base.phtml";
?>