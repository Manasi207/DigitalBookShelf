<?php
// Connect to your database
$conn = new mysqli('localhost', 'root', 'root2714', 'bookshelf');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Get the form data
$bookId = $_POST['bookId'];
$bookName = $_POST['bookName'];
$description = $_POST['description'];
$price = $_POST['price']; // Ensure price is a number (float or int)

// Create an uploads folder if it doesn't exist
$uploadDir = 'Uploads/';
if (!is_dir($uploadDir)) {
    mkdir($uploadDir, 0777, true);
}

// Handle file uploads
$pdfFilePath = null;
$coverImagePath = null;

if ($_FILES['pdfFile']['name']) {
    $pdfFile = basename($_FILES['pdfFile']['name']);
    $pdfFilePath = $uploadDir . $pdfFile;
    move_uploaded_file($_FILES['pdfFile']['tmp_name'], $pdfFilePath);
}

if ($_FILES['coverImage']['name']) {
    $coverImage = basename($_FILES['coverImage']['name']);
    $coverImagePath = $uploadDir . $coverImage;
    move_uploaded_file($_FILES['coverImage']['tmp_name'], $coverImagePath);
}

// Prepare the update query
$sql = "UPDATE allbooks SET bookname=?, description=?, price=?";
$params = [$bookName, $description, $price]; // Use a temporary array for binding parameters

if ($pdfFilePath) {
    $sql .= ", pdffile=?";
    $params[] = $pdfFilePath;
}
if ($coverImagePath) {
    $sql .= ", coverimage=?";
    $params[] = $coverImagePath;
}
$sql .= " WHERE id=?";

$stmt = $conn->prepare($sql);

// Add bookId to parameters
$params[] = $bookId;

// Build the bind parameter string based on the types of the values
$types = str_repeat('s', count($params) - 1); // All strings except the last one
$types .= 'i'; // Assuming bookId is an integer

$stmt->bind_param($types, ...$params); // Use the spread operator to unpack the array

/// Execute the query
if ($stmt->execute()) {
    echo "<script>
            alert('Book Updated Successfully');
            window.location.href = 'AdminExploreSpiritual.php';
          </script>";
} else {
    echo "Error updating book: " . $stmt->error; // Use $stmt->error for detailed error
}


$stmt->close();
$conn->close();
?>
