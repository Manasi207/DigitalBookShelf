<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the PHPMailer library
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader (if using Composer)
require 'vendor/autoload.php'; // Make sure to adjust the path if needed

// Database connection (replace with your own database credentials)
$servername = "localhost";
$username = "your_db_username";
$password = "your_db_password";
$dbname = "your_db_name";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the email is set
if (isset($_POST['email'])) {
    $email = $_POST['email'];

    // Check if the email exists in the database
    $sql = "SELECT * FROM users WHERE email='$email'"; // Adjust table name and field as necessary
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Generate a unique token
        $token = bin2hex(random_bytes(50));

        // Store the token in the database (you may want to store it with an expiration time)
        $sql = "UPDATE users SET reset_token='$token' WHERE email='$email'";
        $conn->query($sql);

        // Create a reset link
        $resetLink = "http://your-website.com/reset-password.php?token=$token"; // Change to your actual URL

        // Send the email using PHPMailer
        $mail = new PHPMailer(true);
        try {
            // Server settings
            $mail->isSMTP(); // Set mailer to use SMTP
            $mail->Host = 'smtp.gmail.com'; // Specify main and backup SMTP servers
            $mail->SMTPAuth = true; // Enable SMTP authentication
            $mail->Username = 'your-email@gmail.com'; // Your SMTP username
            $mail->Password = 'your-email-password'; // Your SMTP password
            $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
            $mail->Port = 587; // TCP port to connect to

            // Recipients
            $mail->setFrom('your-email@gmail.com', 'Your Website Name');
            $mail->addAddress($email); // Add a recipient

            // Content
            $mail->isHTML(true); // Set email format to HTML
            $mail->Subject = 'Password Reset Request';
            $mail->Body    = 'Click the following link to reset your password: <a href="' . $resetLink . '">Reset Password</a>';

            $mail->send();
            echo 'Reset link has been sent to your email.';
        } catch (Exception $e) {
            echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        }
    } else {
        echo "No account found with that email address.";
    }
} else {
    echo "Email is required.";
}

// Close the database connection
$conn->close();
?>
