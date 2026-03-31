<?php
require 'autoload.php';

use App\Models\Admin;
use App\Models\RegularUser;
use App\Services\AuthService;

// Create users
$admin = new Admin("Alice", "alice@example.com", "admin123");
$user = new RegularUser("Bob", "bob@example.com", "user123");

// Auth service
$authService = new AuthService();

// Admin login
echo $authService->authenticate($admin, "alice@example.com", "admin123") . "<br>";

// User login
echo $authService->authenticate($user, "bob@example.com", "user123") . "<br>";

// Admin logout
echo $admin->logout();