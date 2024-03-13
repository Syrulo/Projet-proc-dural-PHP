<?php
$db = Utils::connectDB();
if(!isset($_SESSION['user']) && !in_array("ROLE_ADMIN",json_decode($_SESSION['user']['roles']))) {
    header( 'Location:?page=home' );
}
if ($db){
    $sql = $db->prepare("SELECT user.email, contact.firstname, contact.lastname, user.id FROM user JOIN contact on contact.user_id=user.id");
    $sql->execute();
    $profiles = $sql->fetchAll(PDO::FETCH_ASSOC);
}
include "./views/base.phtml";