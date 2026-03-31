<?php
namespace App\Services;

use App\Core\Database;
use PDO;

class AuthService {
    private $conn;

    public function __construct() {
        $db = new Database();
        $this->conn = $db->connect();
    }

    // Register user
    public function register($name, $email, $password, $role) {
        $hashed = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare(
            "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)"
        );
        return $stmt->execute([$name, $email, $hashed, $role]);
    }

    // Login user
    public function login($email, $password) {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email=?");
        $stmt->execute([$email]);

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            session_start();
            $_SESSION['user'] = $user;
            return "Login successful";
        }

        return "Invalid credentials";
    }

    // Logout user
    public function logout() {
        session_start();
        session_destroy();
        return "Logged out";
    }
}