<?php
if ( !isset($_SESSION['user']) || !in_array("ROLE_ADMIN",json_decode($_SESSION['user']['roles'])) ){
    header("Location:?page=home");
    exit();
}
$profil_id = (int)$_GET['id'];
$db = Utils::connectDB();
$sql = $db->prepare("DELETE FROM contact WHERE user_id=$profil_id");
$sql->execute();
$sql = $db->prepare("DELETE FROM user WHERE id=$profil_id");
$sql->execute();
header("Location:?page=admin");