<?php
namespace App\Core;

use PDO;

class Database {
    private $host = "localhost";
    private $db = "user_management";
    private $user = "root";   // XAMPP default
    private $pass = "";       // XAMPP default

    public function connect() {
        try {
            return new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
        } catch (\PDOException $e) {
            die("Database connection failed: " . $e->getMessage());
        }
    }
}