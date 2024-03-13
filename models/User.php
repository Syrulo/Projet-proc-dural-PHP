<?php
require_once("./services/class/Database.php");
class User
{
    // propriété $db pour stocker PDO
    private $db;

    public function __construct(){
        $this->db = new Database();
    }

    public function getAll($nb=null,$query="SELECT * FROM user ORDER BY id DESC"){
        $limit = !is_null($nb) ? " LIMIT ".$nb : "";
        $users = [];
        $users = $this->db->selectAll($query.$limit);
        return $users;
    }

    // Fonction inutile 
public function getOne($id){
        $user = $this->db->select('SELECT * FROM user WHERE id=:id',[
            'id' => $id
        ]);
        return $user;
    }

}