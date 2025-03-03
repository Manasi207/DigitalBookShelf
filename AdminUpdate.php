<?php
session_start(); // Start a session
// if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
//     header("Location: Admin_Login/AdminLogin.php"); // Redirect to login page if not logged in
//     exit;
// }

// Assume these variables hold current user data (fetch from the database in a real scenario)
$current_name = "Admin"; // This would typically be fetched from the database
$current_password = "admin"; // This would typically be fetched from the database

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $new_name = $_POST['name'] ?? $current_name;
    $old_pass = $_POST['old_pass'] ?? '';
    $new_pass = $_POST['new_pass'] ?? '';
    $confirm_pass = $_POST['c_pass'] ?? '';

    // Password update logic
    if (!empty($old_pass) && !empty($new_pass) && !empty($confirm_pass)) {
        if ($old_pass === $current_password) {
            if ($new_pass === $confirm_pass) {
                // Update password in the database (add your database update logic here)
                // Example: updatePasswordInDatabase($new_pass);
                echo "<script>alert('Password updated successfully.');</script>";
                // Update the current password variable if needed
                $current_password = $new_pass;
            } else {
                echo "<script>alert('New password and confirmation do not match.');</script>";
            }
        } else {
            echo "<script>alert('Old password is incorrect.');</script>";
        }
    }

    // Name update logic
    if (!empty($new_name) && $new_name !== $current_name) {
        // Update name in the database (add your database update logic here)
        // Example: updateNameInDatabase($new_name);
        echo "<script>alert('Name updated successfully.');</script>";
        header("Location : AdminProfile.html");
        // Update the current name variable if needed
        $current_name = $new_name;
    }

    // File upload logic
    if (isset($_FILES['profile_pic']) && $_FILES['profile_pic']['error'] === UPLOAD_ERR_OK) {
        $file_tmp = $_FILES['profile_pic']['tmp_name'];
        $file_name = $_FILES['profile_pic']['name'];
        $file_size = $_FILES['profile_pic']['size'];

        // Basic file validation
        if ($file_size <= 5000000) { // Limit size to 5MB
            move_uploaded_file($file_tmp, "uploads/" . $file_name); // Move to uploads directory
            echo "<script>alert('Profile picture updated successfully.');</script>";
        } else {
            echo "<script>alert('Error: File size exceeds limit.');</script>";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Admin Update</title>
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
   <link rel="stylesheet" href="css/style.css">
</head>
<body>

<header class="header">
   <section class="flex">
      <div class="icons">
         <div id="menu-btn" class="fas fa-bars"></div>
         <a href="home.html" class="logo"><b>Bookshelf</b></a>
      </div>
      <form action="search.html" method="post" class="search-form">
         <input type="text" name="search_box" required placeholder="search users..." maxlength="100">
         <button type="submit" class="fas fa-search"></button>
      </form>
      <div class="icons">
         <div id="search-btn" class="fas fa-search"></div>
         <div id="user-btn" class="fas fa-user"></div>
      </div>
      <div class="profile">
         <img src="images/pic-1.jpg" class="image" alt="">
         <h3 class="name"><?php echo $current_name; ?></h3>
         <p class="role">abc</p>
         <a href="profile.html" class="btn">view profile</a>
         <div class="flex-btn">
            <a href="login.html" class="option-btn">login</a>
            <a href="register.html" class="option-btn">register</a>
         </div>
      </div>
   </section>
</header>
<div class="side-bar">

   <div id="close-btn">
      <i class="fas fa-times"></i>
   </div>

   <div class="profile">
      <img src="images/pic-1.jpg" class="image" alt="">
      <h2 class="name" ><b>Admin</b></h2>
      <h6 class="role">a. b. c.</h6>
      <a href="AdminProfile.html" class="btn">view profile</a>
   </div>

   <nav class="navbar">
      <a href="AdminHome.html"><i class="fas fa-home"></i><span>Home</span></a> <!-- Modified to scroll to courses section -->
      <a href="LoginSignup/Admin/admin_page.php"><i class="fas fa-users"></i><span>Manage User</span></a>
      <!-- <a href="manage-author.html"><i class="fas fa-user-edit"></i><span>Manage Author</span></a> -->
      <a href="AdminExploreSpiritual.php"><i class="fas fa-book"></i><span>Book Stock</span></a>
      <!-- <a href="manage-sales.html"><i class="fas fa-chart-line"></i><span>Manage Sales</span></a> -->
      <a href="featured-ebooks.html"><i class="fas fa-star"></i><span>Featured eBooks</span></a>
      <a href="transactions.html"><i class="fas fa-money-bill-wave"></i><span>Transactions</span></a>
  </nav>
  
</div>

<section class="form-container">
   <form action="" method="post" enctype="multipart/form-data">
      <h3>Update Profile</h3>
      <p>Update name</p>
      <input type="text" name="name" maxlength="50" class="box" placeholder="Enter your name" value="<?php echo $current_name; ?>">
      <p>Previous password</p>
      <input type="password" name="old_pass" maxlength="20" class="box">
      <p>New password</p>
      <input type="password" name="new_pass" maxlength="20" class="box">
      <p>Confirm password</p>
      <input type="password" name="c_pass" maxlength="20" class="box">
      <p>Update picture</p>
      <input type="file" name="profile_pic" accept="image/*" class="box">
      <input type="submit" value="Update Profile" name="submit" class="btn">
   </form>
</section>

<!-- Custom JS file link -->
<script src="js/script.js"></script>

</body>
</html>
