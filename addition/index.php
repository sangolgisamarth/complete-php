<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Two Numbers</title>
</head>
<body>

<h2>ADD/SUB/MULT/DIV (Two Numbers)</h2>

<form method="POST">
    Enter Number 1: <input type="number" name="num1" required><br><br>
    Enter Operator: <input type="text" name="operator" required><br><br>
    Enter Number 2: <input type="number" name="num2" required><br><br>
    <button type="submit">Calculate</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $a = $_POST['num1'];
    $b = $_POST['num2'];
    $op = $_POST['operator'];

    if ($op == '+') {
        $result = $a + $b;
    }
    else if ($op == '-') {
        $result = $a - $b;
    }
    else if ($op == '*') {
        $result = $a * $b;
    }
    else if ($op == '/') {
        if ($b == 0) {
            echo "<h3>Cannot divide by zero!</h3>";
            exit();
        }
        $result = $a / $b;
    }
    else {
        echo "<h3>Invalid Operator!</h3>";
        exit();
    }

    echo "<h3>Result: $a $op $b = $result</h3>";
}
?>

</body>
</html>
