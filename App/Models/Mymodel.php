<?php
namespace App\Models;

class Mymodel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
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