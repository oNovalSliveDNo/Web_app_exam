<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>
<body>
    <h2>Register</h2>
    <form method="post" action="register.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit" name="register">Register</button>
    </form>
</body>
</html>


<?php
$host = 'localhost';
$dbname = 'vuln_app';
$username = 'root';
$password = 'password';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

if (isset($_POST['register'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";
    $conn->exec($sql);

    header("Location: index.php");
    exit;
}
?>
