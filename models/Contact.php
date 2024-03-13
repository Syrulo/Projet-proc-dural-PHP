<?php
require_once("./services/class/Database.php");
class Contact 
{
    // propriété $db pour stocker PDO
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAll($nb=null,$query="SELECT * FROM contact ORDER BY id DESC"){
        $limit = !is_null($nb) ? " LIMIT ".$nb : "";
        $contacts = [];
        $contacts = $this->db->selectAll($query.$limit);
        return $contacts;
    }
}