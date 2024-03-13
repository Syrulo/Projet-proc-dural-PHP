<?php
class Utils{

    const DB_HOST = "localhost";
    const DB_NAME = "mvc_php";
    const DB_USER = "root";
    const DB_PASS = "motdepassrootquimarche";

    // Fonction de connection
    static function connectDB()
    {
        $db = false;
        try {
        $db = new PDO('mysql:host='.self::DB_HOST.';dbname='.self::DB_NAME, 'root', '');
    } catch (PDOException $e) {
        $error = $e;
         // tenter de réessayer la connexion après un certain délai, par exemple
            echo "Hum problème de connexion au serveur de base de données".$e;
        }
        return $db;
    }

    // Fonction de recherche de rôle
    static function isRole($role) { //return true ou false
        // Si $_SESSION['user'] est défini
        // ET $_SESSION['user']['role'] contient le rôle indiqué
        // $is_role retourne un booléen true/false
        $is_role = isset($_SESSION['user']) && in_array($role,json_decode($_SESSION['user']['roles']));
        return $is_role;
    }

    // Fonction de debug simple
    static function dump($var){
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
    }  

    // Fonction de debug avec un die
    static function dump_die($var){
        echo "<pre>";
        var_dump($var);
        echo "</pre>";
        die;
    }

    // Fonction pour éviter d'ecrire les htmlentities et les stip_tags des input
    static function inputCleaner($input){
        $string = htmlentities((strip_tags($input)));
        return $string;
    }

}