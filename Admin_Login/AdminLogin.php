<?php
require_once 'AuthService.php';
$auth = new AuthService();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'] ?? '';
    $pass = $_POST['pass'] ?? '';

    if ($auth->login($username, $pass)) {
        echo "<script>alert('Logged in'); window.location.href='../index.html';</script>";
        exit();
    } else {
        echo "<script>alert('Invalid username or password');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="main.css">
</head>
<body>
    <form method="post">
        <input type="text" name="username" placeholder="Username" class="input100">
        <input type="password" name="pass" placeholder="Password" class="input100">
        <button type="submit" id="loginBtn">Login</button>
    </form>
</body>
</html>
