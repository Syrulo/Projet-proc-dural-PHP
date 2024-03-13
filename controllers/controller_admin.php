<?php
// Si $_SESSION['user'] n'est pas défini
// OU $_SESSION['user']['roles'] ne contient pas ROLE_ADMIN
// DANS CE CAS ON REDIRIGE SUR LA HOME
if ( !isset($_SESSION['user']) || !in_array("ROLE_ADMIN",json_decode($_SESSION['user']['roles'])) ){
    header("Location:?page=home");
    exit();
}
require_once("./models/Post.php");

$post = new Post();
$posts = $post->getALL(null, "SELECT * FROM post ORDER BY id DESC");

include "./views/base.phtml";