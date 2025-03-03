<?php
$servername = "localhost";
$username = "root";
$password = "root2714";
$dbname = "bookshelf";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Capture form data
$fullname = $_POST['fullname'];
$email = $_POST['email'];
$password = $_POST['password'];
$paymentid = $_POST['paymentid'];
$bookname = $_POST['bookname'];
$price = $_POST['price'];
// Insert data into database
$sql = "INSERT INTO downloadbook (name, email, pass, paymentid,bookname,price) VALUES ('$fullname', '$email', '$password', '$paymentid','$bookname','$price')";

if ($conn->query($sql) === TRUE) {
    // Redirect to books page after success
    
    header("Location: UserExploreSpiritual.php");
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
