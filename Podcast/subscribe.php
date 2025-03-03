<?php
// Enable error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Include the database connection file
include 'dbconnect2.php';

// Check if the request method is POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Check if the email field is set and not empty
    if (isset($_POST['email']) && !empty($_POST['email'])) {
        // Get and sanitize the email input
        $email = $_POST['email'];
        $email = $conn->real_escape_string($email);

        // Check for existing email subscriptions
        $result = $conn->query("SELECT * FROM subcribers WHERE email = '$email'");

        // Check for query errors
        if ($result === false) {
            echo "Error checking email: " . $conn->error;
            exit;
        }

        // If the email is already subscribed
        if ($result->num_rows > 0) {
            echo "This email is already subscribed.";
        } else {
            // Insert the new email into the database
            $query = "INSERT INTO subcribers (email) VALUES ('$email')";
            if ($conn->query($query) === TRUE) {
                echo "<script>alert('Thank you for subscribing!'); window.location.href='pcast.php';</script>";
            } else {
                echo "Error inserting email: " . $conn->error;
            }
        }
    } else {
        echo "Email is not set or is empty.";
    }
}

// Close the database connection
$conn->close();
?>
