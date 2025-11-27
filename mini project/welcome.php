<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Welcome</title>
<style>
    body { background:#0f0f0f; color:white; font-family:Arial; text-align:center; padding-top:100px; }
    a { color:#ff5555; font-size:20px; }
</style>
</head>
<body>

<h1>Welcome, <?php echo $_SESSION['username']; ?> 👋</h1>
<a href="logout.php">Logout</a>

</body>
</html>
