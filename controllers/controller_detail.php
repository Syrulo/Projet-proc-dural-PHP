<?php
$db = Utils::connectDB();
$id = $_GET['id'];
$member = false;
if(isset($_SESSION['user']) && in_array("ROLE_ADMIN",json_decode($_SESSION['user']['roles']))) {
    $member = true;
}
if(isset($_POST['commentaire']) && !empty($_POST['commentaire'])) {
    $commentaire = htmlentities(strip_tags($_POST['commentaire']));
    $user_id = $_SESSION['user']['id'];
    $sql = $db->prepare("INSERT INTO commentaire (user_id, post_id, commentaire) VALUES (:user_id, :post_id, :commentaire)");
    $sql-> bindParam(':user_id', $user_id);
    $sql-> bindParam(':post_id', $id);
    $sql-> bindParam(':commentaire', $commentaire);
    $sql-> execute();
}
if ($db){
   $sql = $db->prepare("SELECT post.*,contact.firstname,contact.lastname FROM post,contact WHERE post.id=:id");
   $sql-> bindParam(':id', $id);
   $sql->execute();
   $post = $sql->fetch(PDO::FETCH_ASSOC);
   $sql = $db->prepare("SELECT *, commentaire.created_at as datecom FROM commentaire JOIN user on commentaire.user_id=user.id JOIN contact on contact.user_id=user.id WHERE commentaire.post_id=:id ORDER BY commentaire.id DESC LIMIT 1");
   $sql-> bindParam(':id', $id);
   $sql->execute();
   $commentaires = $sql->fetchAll(PDO::FETCH_ASSOC);

}
// blah blah blah
// On charge la vue
include "./views/base.phtml";