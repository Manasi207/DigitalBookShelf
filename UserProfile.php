<!-- <!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile - Digital BookShelf</title>
    <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">
    <link rel="stylesheet" href="./assets/css/style1.css">
    <link rel="stylesheet" href="https://unpkg.com/ionicons@5.5.2/dist/ionicons.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container light-style flex-grow-1 container-p-y">
        <h4 class="font-weight-bold py-3 mb-4">
              Profile
        </h4>
        <div class="card overflow-hidden">
            <div class="row no-gutters row-bordered row-border-light">
                <div class="col-md-3 pt-0">
                    <div class="list-group list-group-flush account-settings-links">
                        <a class="list-group-item list-group-item-action active" data-toggle="list" href="#account-general">General</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-change-password">Change password</a>
                        <a class="list-group-item list-group-item-action" data-toggle="list" href="#account-logout">Logout</a>
                    </div>
                </div>
                <div class="col-md-9">
                    <div class="tab-content">
                        <div class="tab-pane fade active show" id="account-general">
                            <div class="card-body media align-items-center">
                                <img src="./assets/images/pic-1.jpg" alt="Profile Picture" class="d-block ui-w-80">
                            </div>
                            <hr class="border-light m-0">
                            <div class="card-body">
                                <div class="form-group">
                                    <label class="form-label">Username</label>
                                    <input type="text" class="form-control mb-1" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Name</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">E-mail</label>
                                    <input type="text" class="form-control mb-1" value="">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Mobile No</label>
                                    <input type="text" class="form-control" value="">
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="account-change-password">
                            <div class="card-body pb-2">
                                <div class="form-group">
                                    <label class="form-label">Current password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">New password</label>
                                    <input type="password" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label class="form-label">Repeat new password</label>
                                    <input type="password" class="form-control">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-right mt-3">
                        <button type="button" class="btn btn-primary">Save changes</button>&nbsp;
                        <button type="button" class="btn btn-default">Cancel</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script data-cfasync="false" src="/cdn-cgi/scripts/5c5dd728/cloudflare-static/email-decode.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html> -->
<?php
include 'dbconnect.php';

// For demonstration purposes, we will assume the Sr_no is known.
// Replace with actual logic to get the Sr_no of the logged-in user.
// For example, from a query parameter or a secure method after login.
$sr_no = 1; // Example: fetching the profile of user with Sr_no = 1

// Fetch user details from the database
$stmt = $pdo->prepare("SELECT * FROM user WHERE Sr_no = ?");
$stmt->execute([$sr_no]);
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$user) {
    die("User not found.");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
    font-family: 'Arial', sans-serif;
    background-color: #f8f9fa; /* Light background for contrast */
    margin: 0;
    padding: 20px;
    display: flex;
    flex-direction: column; /* Change to column for proper alignment */
    align-items: center; /* Center all children (including the title) */
    height: 100vh;
}

h1 {
    color: #333;
    text-align: center;
    margin-bottom: 10px; /* Adjust spacing for the title */
    font-size: 2.5rem; /* Larger font size for prominence */
}

h2 {
    color: #333;
    text-align: center; /* Center align the Update Profile heading */
    margin-bottom: 30px; /* Spacing below the heading */
    font-size: 2rem; /* Slightly smaller than the main title */
}

form {
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    padding: 30px; /* Increased padding for spacious feel */
    max-width: 400px;
    width: 100%;
}

label {
    display: block;
    margin: 15px 0 5px;
    font-weight: bold;
    color: #555;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 12px; /* Increased padding for comfort */
    margin-bottom: 20px;
    border: 1px solid #ccc;
    border-radius: 5px;
    font-size: 16px; /* Increased font size for readability */
    transition: border-color 0.3s;
}

input[type="text"]:focus,
input[type="email"]:focus,
input[type="password"]:focus {
    border-color: #007BFF;
    outline: none;
}

button,
input[type="submit"] {
    padding: 12px; /* Increased padding for buttons */
    color: #fff;
    background-color: #007BFF;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    font-size: 16px;
    width: 100%;
    transition: background-color 0.3s, transform 0.2s;
}

button:hover,
input[type="submit"]:hover {
    background-color: #0056b3;
    transform: translateY(-1px); /* Slight lift effect on hover */
}

#editBtn {
    background-color: #28a745; /* Green color for edit button */
}

#editBtn:hover {
    background-color: #218838;
}

#updateBtn {
    display: none; /* Initially hidden */
}

/* Responsive design */
@media (max-width: 500px) {
    form {
        width: 90%;
    }
}

    </style>
</head>
<body>
    <h1>User Profile</h1> <!-- Moved here for positioning -->
    <h2 style="text-align: center; margin-bottom: 30px;">Update Profile</h2> <!-- New Heading -->
    <form action="userupdateprofile.php" method="POST">
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($user['Name']); ?>" readonly>

        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($user['Email']); ?>" readonly>

        <label for="password">Password:</label>
        <input type="password" id="password" name="password" value="<?php echo htmlspecialchars($user['Password']); ?>" readonly>

        <input type="hidden" name="sr_no" value="<?php echo $user['Sr_no']; ?>">

        <button type="button" id="editBtn">Edit</button>
        <input type="submit" value="Update" style="display: none;" id="updateBtn">
    </form>

    <script>
        document.getElementById('editBtn').onclick = function() {
            document.getElementById('name').readOnly = false;
            document.getElementById('email').readOnly = false;
            document.getElementById('password').readOnly = false;
            document.getElementById('updateBtn').style.display = 'inline';
        };
    </script>
</body></html>
