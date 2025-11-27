<?php include 'db.php'; ?>

<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <style>
        body { background:#0f0f0f; color:white; font-family:Arial; display:flex; justify-content:center; align-items:center; height:100vh; }
        .box { width:350px; background:#1c1c1c; padding:25px; border-radius:15px; }
        input { width:100%; padding:10px; border:none; border-radius:10px; margin:10px 0; }
        button { width:100%; padding:10px; background:#00aaff; border:none; border-radius:10px; color:white; cursor:pointer; font-size:16px; }
        a { color:#00aaff; }
    </style>
</head>
<body>

<div class="box">
    <h2>Register</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = password_hash($_POST['password'], PASSWORD_DEFAULT);

        $sql = "INSERT INTO users (username, email, password) VALUES ('$username', '$email', '$password')";
        if (mysqli_query($conn, $sql)) {
            echo "<p style='color:lightgreen;'>Registration successful! <a href='login.php'>Login</a></p>";
        } else {
            echo "<p style='color:red;'>Error: " . mysqli_error($conn) . "</p>";
        }
    }
    ?>

    <form method="POST">
        <input type="text" name="username" placeholder="Enter Username" required>
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit">Register</button>
    </form>

    <p>Already have an account? <a href="login.php">Login</a></p>
</div>

</body>
</html>
