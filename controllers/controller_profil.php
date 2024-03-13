<?php
$db = Utils::connectDB();
$id = $_GET['id'];
$member = false;
if(isset($_SESSION['user']) && in_array("ROLE_MEMBER",json_decode($_SESSION['user']['roles']))) {
   $member = true;
}
if ($db){
   $sql = $db->prepare("SELECT user.id, user.email, contact.firstname, contact.lastname, contact.address1, contact.address2, contact.city, contact.state, contact.zip FROM user,contact WHERE user.id=:id and contact.user_id=:id");
   $sql-> bindParam(':id', $id);
   $sql->execute();
   $post = $sql->fetch(PDO::FETCH_ASSOC);
}
include "./views/base.phtml";