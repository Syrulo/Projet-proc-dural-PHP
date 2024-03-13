<?php
require_once("./services/class/Database.php");
class Commentaire 
{
    // propriété $db pour stocker PDO
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAll($nb=null,$query="SELECT * FROM commentaire ORDER BY id DESC"){
        $limit = !is_null($nb) ? " LIMIT ".$nb : "";
        $commentaires = [];
        $commentaires = $this->db->selectAll($query.$limit);
        return $commentaires;
    }
}