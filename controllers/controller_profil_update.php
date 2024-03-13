<?php
if ( !isset($_SESSION['user']) || !in_array("ROLE_MEMBER",json_decode($_SESSION['user']['roles'])) ){
    header("Location:?page=home");
    exit();
}
$errors = [];

$profil_id = (int)$_GET['id'];

$db = Utils::connectDB();
$sql = $db->prepare("SELECT user.id, user.email, contact.firstname, contact.lastname, contact.address1, contact.address2, contact.city, contact.state, contact.zip FROM user, contact WHERE user.id=$profil_id and contact.user_id=$profil_id");
$sql->execute();
$the_profil = $sql->fetch(PDO::FETCH_ASSOC);

if (isset($_POST['email']) && isset($_POST['firstname']) && isset($_POST['lastname']) && !empty($_POST['email']) && !empty($_POST['firstname']) && !empty($_POST['lastname'])) {
    $email = htmlentities(strip_tags($_POST['email']));
    $firstname = htmlentities(strip_tags($_POST['firstname']));
    $lastname = htmlentities(strip_tags($_POST['lastname']));
    $address1 = htmlentities(strip_tags($_POST['address1']));
    $address2 = htmlentities(strip_tags($_POST['address2']));
    $city = htmlentities(strip_tags($_POST['city']));
    $state = htmlentities(strip_tags($_POST['state']));
    $zip = htmlentities(strip_tags($_POST['zip']));
    $sql = $db->prepare("UPDATE `user` SET `email` = :email WHERE `user`.`id` = $profil_id");
            $sql->bindParam(':email', $email);
            $sql->execute();
    $sql = $db->prepare("UPDATE `contact` SET `firstname` = :firstname, `lastname` = :lastname, `address1` = :address1, `address2` = :address2, `city` = :city,`state` = :state, `zip` = :zip WHERE `contact`.`user_id` = $profil_id");
            $sql->bindParam(':firstname', $firstname);
            $sql->bindParam(':lastname', $lastname);
            $sql->bindParam(':address1', $address1);
            $sql->bindParam(':address2', $address2);
            $sql->bindParam(':city', $city);
            $sql->bindParam(':state', $state);
            $sql->bindParam(':zip', $zip);
            $sql->execute();
    header("Location:?page=profil&id=$profil_id");
    }

    $state = [
        "Auvergne-Rhone-Alpes",
        "Bourgogne-Franche-Comte",
        "Bretagne",
        "Centre-Val de Loire",
        "Corse",
        "Grand Est",
        "Hauts-de-France",
        "Ile-de-France",
        "Normandie",
        "Nouvelle-Aquitaine",
        "Occitanie",
        "Pays de la Loire",
        "Provence Alpes Cote d'Azur",
        "Guadeloupe",
        "Guyane",
        "Martinique",
        "Mayotte",
        "Reunion"
    ];

include "./views/base.phtml";