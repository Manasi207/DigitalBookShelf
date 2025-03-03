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
$sql = "INSERT INTO downloadbook (name, email, pass, paymentid, bookname, price) VALUES ('$fullname', '$email', '$password', '$paymentid', '$bookname', '$price')";

if ($conn->query($sql) === TRUE) {
    // Fetch the PDF associated with the book
    $pdfQuery = "SELECT pdffile FROM allbooks WHERE bookname='$bookname'";
    $pdfResult = $conn->query($pdfQuery);

    if ($pdfResult->num_rows > 0) {
        $row = $pdfResult->fetch_assoc();
        $pdfFile = $row['pdffile'];

        // Download the PDF
        if (file_exists($pdfFile)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/pdf');
            header('Content-Disposition: attachment; filename="' . basename($pdfFile) . '"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($pdfFile));
            readfile($pdfFile);

            // Redirect back to the books page after successful download
            echo "<script>
                    alert('Book downloaded successfully!');
                    window.location.href = 'UserExploreSpiritual.php';
                  </script>";
            exit;
        } else {
            echo "Error: File not found.";
        }
    } else {
        echo "Error: Book not found.";
    }
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
