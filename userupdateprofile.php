<?php
include 'dbconnect.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated user details from the form
    $sr_no = $_POST['sr_no'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Optionally hash the password before storing (recommended)
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Update the user details in the database
    $stmt = $pdo->prepare("UPDATE user SET Name = ?, Email = ?, Password = ? WHERE Sr_no = ?");
    $stmt->execute([$name, $email, $hashed_password, $sr_no]);

    // Redirect back to the user profile page
    header("Location: UserProfile.php");
    exit();
}
?>
