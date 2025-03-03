<?php
include '../SignUp/dbconnect.php';

if (!isset($_GET['Sr_no']) || empty($_GET['Sr_no'])) {
    echo "User ID is missing.";
    exit; // Stop further execution
}

$id = $_GET['Sr_no'];
$query = "DELETE FROM user WHERE Sr_no = '$id'";
$data = mysqli_query($conn, $query);
// $result = mysqli_fetch_assoc($data);

if ($data) {
    echo "<script>alert('Data successfully deleted!')</script>";
    ?>
    <meta http-equiv = "refresh" content = "1; url = http://localhost/e-book/Admin/admin_page.php"/>
    <?php
} else {
    echo "Database error: " . mysqli_error($conn);
}

?>