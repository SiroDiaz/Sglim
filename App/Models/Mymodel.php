<?php
namespace App\Models;

class Mymodel extends Model {
    public function __construct($db) {
        parent::__construct($db);
    }

    public function getAllUsers() {
        $query = $this->db->prepare('SELECT * FROM users');
        $result = $query->execute();
        if($result) {
            return $query->fetchAll();
        }

        return [];
    }
}