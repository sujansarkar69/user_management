<?php
namespace App\Core;

use PDO;

class Database {
    private $host = "localhost";
    private $db = "user_management";
    private $user = "root";
    private $pass = "";

    public function connect() {
        return new PDO("mysql:host=$this->host;dbname=$this->db", $this->user, $this->pass);
    }
}