<?php
require 'autoload.php';
use App\Services\AuthService;

$auth = new AuthService();

if ($_POST) {
    $success = $auth->register($_POST['name'], $_POST['email'], $_POST['password'], "user");
    if ($success) {
        echo "Registered successfully. <a href='index.php'>Login here</a>";
    } else {
        echo "Registration failed.";
    }
}
?>

<form method="POST">
    Name: <input type="text" name="name" required><br>
    Email: <input type="email" name="email" required><br>
    Password: <input type="password" name="password" required><br>
    <button type="submit">Register</button>
</form>