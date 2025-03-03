<?php
// Start session
session_start();

// Database connection (same as before)
$servername = "localhost";
$username = "root";
$password = "root2714";
$dbname = "bookshelf";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if (isset($_GET['token'])) {
    $token = $_GET['token'];

    // Check if the token is valid
    $sql = "SELECT * FROM users WHERE reset_token='$token'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $newPassword = $_POST['password'];
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT); // Hash the password

            // Update the password in the database and clear the token
            $sql = "UPDATE users SET password='$hashedPassword', reset_token=NULL WHERE reset_token='$token'";
            $conn->query($sql);

            echo "Password has been reset successfully. You can now log in.";
        }
    } else {
        echo "Invalid token.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Reset Password</title>
</head>
<body>
    <form method="POST" action="">
        <label for="password">New Password:</label>
        <input type="password" name="password" required>
        <button type="submit">Reset Password</button>
    </form>
</body>
</html>
