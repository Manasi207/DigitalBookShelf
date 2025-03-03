<?php
// Connect to your database
$conn = new mysqli('localhost', 'root', 'root2714', 'bookshelf');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the book ID from the URL
$bookId = $_GET['id'];

// Prepare and execute the deleindexte query
$sql = "DELETE FROM allbooks WHERE id=?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $bookId);

if ($stmt->execute()) {
    echo "Book deleted successfully!";
    header('Location: AdminExploreSpiritual.php'); // Redirect back to the main page after deletion
} else {
    echo "Error deleting book: " . $conn->error;
}

$conn->close();
?>
