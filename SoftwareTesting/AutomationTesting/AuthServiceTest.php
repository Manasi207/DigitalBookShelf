<!-- <?php
require_once __DIR__ . '/../Admin_Login/AuthService.php';

function assertEquals($expected, $actual, $message) {
    if ($expected === $actual) {
        echo "✔️ PASSED: $message\n";
    } else {
        echo "❌ FAILED: $message (Expected: $expected, Got: $actual)\n";
    }
}

// Run tests
$auth = new AuthService();

assertEquals(true, $auth->login("admin", "admin"), "Correct credentials should so succeed");
assertEquals(false, $auth->login("admin", "wrong"), "Wrong password should so failed");
assertEquals(false, $auth->login("user", "admin"), "Wrong username should so failed");
assertEquals(false, $auth->login("user", "1234"), "Both wrong should so failed");
?> -->


<?php
require_once __DIR__ . '/../Admin_Login/AuthService.php';

// Create AuthService object
$auth = new AuthService();

while (true) {
    // Take input from user
    echo "Enter username: ";
    $username = trim(fgets(STDIN));

    echo "Enter password: ";
    $password = trim(fgets(STDIN));

    // Check login result 
    if ($auth->login(user: $username, pass: $password)) {
        echo "✅ PASSED: Login successful for user '$username'\n";
        break; // stop the loop if credentials are correct
    } else {
        echo "❌ FAILED: Invalid credentials for user '$username'. Try again!\n\n";
    }
}
?>
