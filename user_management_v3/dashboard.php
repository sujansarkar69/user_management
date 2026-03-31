<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
?>

<h2>Welcome, <?php echo $_SESSION['user']['name']; ?></h2>
<p>Role: <?php echo $_SESSION['user']['role']; ?></p>
<a href="logout.php">Logout</a>