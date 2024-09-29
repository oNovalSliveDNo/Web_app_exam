<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
    <h2>Login</h2>
    <form method="post" action="index.php">
        <label for="username">Username:</label>
        <input type="text" id="username" name="username" required><br><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br><br>
        <button type="submit" name="login">Login</button>
    </form>
</body>
</html>


<?php
session_start();
$host = 'localhost';
$dbname = 'vuln_app';
$username = 'root';
$password = 'password';

$conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);

if (isset($_POST['login'])) {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username='$user' AND password='$pass'";
    $stmt = $conn->query($sql);
    $result = $stmt->fetch();

    if ($result) {
        setcookie('username', $user, time() + 3600, "/");
        $_SESSION['username'] = $user;
        header("Location: welcome.php");
        exit;
    } else {
        echo "Invalid login credentials!";
    }
}
?>
