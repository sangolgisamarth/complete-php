<?php include 'db.php'; session_start(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body { background:#0f0f0f; color:white; font-family:Arial; display:flex; justify-content:center; align-items:center; height:100vh; }
        .box { width:350px; background:#1c1c1c; padding:25px; border-radius:15px; }
        input { width:100%; padding:10px; border:none; border-radius:10px; margin:10px 0; }
        button { width:100%; padding:10px; background:#00ff99; border:none; border-radius:10px; color:black; cursor:pointer; font-size:16px; }
        a { color:#00aaff; }
    </style>
</head>
<body>

<div class="box">
    <h2>Login</h2>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $sql = "SELECT * FROM users WHERE email='$email'";
        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_assoc($result);

            if (password_verify($password, $row['password'])) {
                $_SESSION['username'] = $row['username'];
                header("Location: welcome.php");
                exit;
            } else {
                echo "<p style='color:red;'>Invalid password!</p>";
            }
        } else {
            echo "<p style='color:red;'>Email not found!</p>";
        }
    }
    ?>

    <form method="POST">
        <input type="email" name="email" placeholder="Enter Email" required>
        <input type="password" name="password" placeholder="Enter Password" required>
        <button type="submit">Login</button>
    </form>

    <p>No account? <a href="register.php">Register</a></p>
</div>

</body>
</html>
