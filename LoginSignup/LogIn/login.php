<?php
session_start();
include '../SignUp/dbconnect.php';

if (isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    if (empty($email) || empty($password)) {
        $_SESSION['error'] = 'Please fill in both fields.';
        header("Location: login.php");
        exit;
    }

    // Use prepared statement
    $stmt = $conn->prepare("SELECT * FROM user WHERE Email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($user = $result->fetch_assoc()) {
        // Debugging (remove in production)
        // echo "Trying to verify for email: " . $email . "<br>";
        // echo "Password from form: " . $password . "<br>";
        // echo "Password from database: " . $user["Password"] . "<br>";

        // Verify password
        if (password_verify($password, $user["Password"])) {
            unset($_SESSION['error']);
            header("Location: ../../index.html");
            exit;
        } else {
            $_SESSION['error'] = 'Incorrect password.';
            header("Location: login.php");
            exit;
        }
    } else {
        $_SESSION['error'] = 'Email does not match.';
        header("Location: login.php");
        exit;
    }
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" href="login.css">
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
                <a href="login.php" class="navbar">Home</a>
                <a href="../Comming_Soon/Comming_Soon.php" class="navbar">About</a>
                <a href="../Comming_Soon/Comming_Soon.php" class="navbar">Reviews</a>
                <a href="../Comming_Soon/Comming_Soon.php" class="navbar">Contact</a>
            </nav> -->

        </div>
    </header>

    <main>
        <section class="login-section">
        <div class="signup-image">
                <img src="../images/img1.svg" alt="image">
            </div> 

            <div class="login-container">
                <h2>Login</h2>
                <?php
                if (isset($_SESSION['error'])) {
                    echo "<div class='error-message' style='color: red;'>" . $_SESSION['error'] . "</div>";
                    unset($_SESSION['error']); // Clear the error message after displaying
                }
                ?> <?php
                if (isset($_SESSION['error'])) {
                    echo "<div class='error-message' style='color: red;'>" . $_SESSION['error'] . "</div>";
                    unset($_SESSION['error']); // Clear the error message after displaying
                }
                ?>
                <form class="login-form" method="POST" action="login.php">
                    <div class="input-group">
                        <input type="email" id="email" name="email" placeholder="Enter your email" required>
                        <button onclick="voice('email')" class="voice-search" id="voicesearch"><ion-icon name="mic-outline"></ion-icon></button>
                        <div id="email-error" class="error-message"></div>
                    </div>
                    <div class="input-group">
                        <input type="password" id="password" name="password" placeholder="Enter your password" required>
                        <button onclick="voice('password')" class="voice-search" id="voicesearch"><ion-icon name="mic-outline"></ion-icon></button>
                        <div id="password-error" class="error-message"></div>
                    </div>
                    <div class="remember-me">
                        <input type="checkbox" id="remember" name="remember">

                        <label for="remember">Remember Me</label>
                    </div>
                    <a href="#" class="forgot-password">Forgot Password?</a>
                    <button type="submit" class="login-btn" name="login" >Login</button>
                </form>
                <p class="sign-up-link">Don't have an account? <a href="../SignUp/signup.php">Sign Up</a></p>
                <p class="sign-up-link" style="font-weight:bold;">Login as Admin? <a href="../../Admin_Login/AdminLogin.php">Click here</a></p>
            
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
    <script src="login.js"></script>
</body>

</html>