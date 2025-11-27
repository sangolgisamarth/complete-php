<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Display Data</title>

    <style>
        body{
            background:#0f0f0f;
            font-family:Arial;
            color:white;
        }
        table{
            width:50%;
            margin:auto;
            border-collapse:collapse;
            background:#1e1e1e;
            box-shadow:0 0 10px rgba(255,255,255,0.2);
        }
        th, td{
            padding:12px;
            border:1px solid #444;
            text-align:center;
        }
        th{
            background:#222;
        }
        h2{
            text-align:center;
            color:#00ffcc;
        }
    </style>

</head>
<body>

<h2>User Records</h2>

<?php
include("connect.php");

$sql = "SELECT * FROM users";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {

    echo "<table>";
    echo "<tr><th>ID</th><th>Name</th><th>Email</th></tr>";

    while ($row = mysqli_fetch_assoc($result)) {

        echo "<tr>";
        echo "<td>".$row['id']."</td>";
        echo "<td>".$row['name']."</td>";
        echo "<td>".$row['email']."</td>";
        echo "</tr>";
    }

    echo "</table>";

} else {
    echo "<p style='text-align:center;'>No records found.</p>";
}

mysqli_close($conn);
?>

</body>
</html>
