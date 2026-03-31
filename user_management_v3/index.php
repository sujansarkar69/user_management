<?php
require 'autoload.php';
use App\Services\AuthService;

$auth = new AuthService();

if ($_POST) {
    echo $auth->login($_POST['email'], $_POST['password']);
    if (!isset($_SESSION)) session_start();
    if (isset($_SESSION['user'])) {
        header("Location: dashboard.php");
        exit;
    }
}
?>

<form method="POST">
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Login</button>
</form>

<p>Don't have an account? <a href="register.php">Register here</a></p>