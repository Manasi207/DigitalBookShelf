<?php
// $showErr = false;
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    include 'dbconnect.php';
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $exists =false;
    // Validate form data
    $errors = [];

    if (empty($name)) {
        $errors['name'] = "Name is required.";
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'] = "Valid email is required.";
    }

    if (empty($password)) {
        $errors['password'] = "Password is required.";
    } elseif ($password !== $confirm_password) {
        $errors['confirm-password'] = "Passwords do not match.";
    }

    // Check if the user already exists
    $sql = "SELECT * FROM user WHERE Email='$email'";
    $result = mysqli_query($conn, $sql);
    $exists = mysqli_num_rows($result) > 0;

    if ($exists) {
        $errors['email'] = "Email already registered.";
    }

    // Insert user if there are no errors
    if (($password == $confirm_password) && $exists==false) {
        // Hash the password
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);

        $sql = "INSERT INTO user ( Name, Email, Password, Date) VALUES ('$name', '$email', '$hashed_password', current_timestamp());";
        $result = mysqli_query($conn, $sql);
        
        if ($result) {
            // $showAlert = true;
           
          echo "<script>alert('You have successfully registered!!')</script>";
          echo "<script>window.location.href = '../LogIn/login.php';</script>"; 
        } else {
            // Handle error
            $errors['db'] = "Database error: " . mysqli_error($conn);
        }
    }

    // Display errors
    foreach ($errors as $error) {
        echo "<p class='error-message'>{$error}</p>";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup Page</title>
    <link rel="stylesheet" href="../SignUp/signup.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
      <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous"> -->
</head>

<body>
    <header class="header">
        <div class="container">
            <a href="#" class="logo"><ion-icon name="book-sharp"></ion-icon>Bookshelf</a>
            <!-- <nav class="nav">
                <a href="../LogIn/login.php" class="navbar">Home</a>
                <a href="../LogIn/login.php" class="navbar">About</a>
                <a href="../Comming_Soon/Comming_Soon.php" class="navbar">Reviews</a>
                <a href="../Comming_Soon/Comming_Soon.php" class="navbar">Contact</a>
            </nav> -->
        </div>
    </header>

    <main>
        <section class="signup-section">
            <div class="signup-image">
                <img src="../images/img1.svg" alt="image">
            </div> 
            <div class="signup-container">
                <h2>Sign Up</h2>
                <form class="signup-form" id="signup-form" method="POST" action="signup.php">
                    <div class="input-group">
                        <input type="text" id="name" name="name" placeholder="Enter your name" required>
                        <button onclick="voice('name')" class="voice-search" id="voicesearch" type="button"><ion-icon name="mic-outline"></ion-icon></button>
                        <span class="error-message" id="name-error"></span>
                    </div>
                    <div class="input-group">
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                        <button onclick="voice('email')" class="voice-search" id="voicesearch" type="button"><ion-icon name="mic-outline"></ion-icon></button>
                        <span class="error-message" id="email-error"></span>
                    </div>
                    <div class="input-group">
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                        <button onclick="voice('password')" class="voice-search" id="voicesearch" type="button"><ion-icon name="mic-outline"></ion-icon></button>
                        <span class="error-message" id="password-error"></span>
                    </div>
                    <div class="input-group">
                        <input type="password" id="confirm-password" name="confirm-password" placeholder="Confirm your password" required>
                        <button onclick="voice('confirm-password')" class="voice-search" id="voicesearch" type="button"><ion-icon name="mic-outline"></ion-icon></button>
                        <span class="error-message" id="confirm-password-error"></span>
                    </div>
                    <button type="submit" class="signup-btn">Sign Up</button>
                </form>
                <p class="login-link">Already have an account? <a href="../LogIn/login.php">Login</a></p>
            </div>
          
        </section>
    </main>

    <footer class="footer" id="contact">
        <div class="container">
            <p>&copy; 2024 Bookshelf Podcast. All rights reserved.</p>
            <div class="social-media">
                <a href="#" aria-label="Facebook"><ion-icon name="logo-facebook"></ion-icon></a>
                <a href="#" aria-label="Twitter"><ion-icon name="logo-twitter"></ion-icon></a>
                <a href="#" aria-label="Instagram"><ion-icon name="logo-instagram"></ion-icon></a>
            </div>
        </div>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    <script src="SignUp/signup.js"></script>
  
</body>

</html>