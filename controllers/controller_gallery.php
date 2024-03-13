<?php
// ma logique de controller
require_once("./models/Post.php");
$post = new Post();
$posts = $post->getALL(null, "SELECT *,post.created_at as datepost,post.id as post_id FROM post LEFT JOIN contact on post.user_id = contact.user_id ORDER BY post.id DESC");
// On charge la vue
include "./views/base.phtml";
?>