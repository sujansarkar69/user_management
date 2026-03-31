<?php
require 'autoload.php';

use App\Services\AuthService;

$auth = new AuthService();

// Test registering a user
$auth->register("Test User", "test@example.com", "test123", "user");

// Test login
echo $auth->login("test@example.com", "test123");