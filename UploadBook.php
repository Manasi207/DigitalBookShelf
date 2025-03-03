<?php
// Database connection (as before)
$servername = "localhost";
$username = "root";
$password = "root2714"; // Your database password
$dbname = "bookshelf"; // Your database name

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $bookName = $_POST['bookName'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    // Handle file uploads
    $targetDir = "Uploads/";
    $pdfFile = $targetDir . basename($_FILES["pdfFile"]["name"]);
    $coverImage = $targetDir . basename($_FILES["coverImage"]["name"]);

    // Check if the file is a PDF and cover image
    if (pathinfo($pdfFile, PATHINFO_EXTENSION) !== 'pdf') {
        die("Only PDF files are allowed.");
    }

    if (!in_array(pathinfo($coverImage, PATHINFO_EXTENSION), ['jpg', 'jpeg', 'png'])) {
        die("Only JPG and PNG image files are allowed.");
    }

    // Move uploaded files to the target directory
    if (move_uploaded_file($_FILES["pdfFile"]["tmp_name"], $pdfFile) && move_uploaded_file($_FILES["coverImage"]["tmp_name"], $coverImage)) {
        // Prepare SQL statement to insert the book into the allbooks table
        $sql = "INSERT INTO allbooks (bookname, pdffile, description, coverimage , price) VALUES ('$bookName', '$pdfFile', '$description', '$coverImage','$price')";
     
     if ($conn->query($sql) === TRUE) {
            // Book uploaded successfully
            header("Location: AdminExploreSpiritual.php?success=1"); // Redirect after successful upload
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Error uploading the files.";
    }
}

$conn->close();
?>
