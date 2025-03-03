<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon</title>
<link rel="stylesheet" href="../LogIn/login.css">
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
       
        .coming-soon-section {
            display: flex;
            justify-content: center;
            align-items: center;
            height: calc(100vh - 80px);
            text-align: center;
            background-color:  hsl(20,43%,93%);
        }

        .coming-soon-container {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .spinner {
            border: 8px solid var(--charcoal);
            border-top: 8px solid var(--primary-color);
            border-radius: 50%;
            width: 60px;
            height: 60px;
            animation: spin 1s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }

        .coming-soon-text {
            font-size: 24px;
            color: var(--dark-color);
            font-weight: 600;
        }
    </style>
</head>

<body>
    <header class="header">
        <div class="container">
            <a href="#" class="logo"><ion-icon name="book-sharp"></ion-icon>Bookish</a>
            <nav class="nav">
                <a href="../LogIn/login.php" class="navbar">Home</a>
                <a href="Comming_Soon.php" class="navbar">About</a>
                <a href="Comming_Soon.php" class="navbar">Reviews</a>
                <a href="Comming_Soon.php" class="navbar">Contact</a>
            </nav>
        </div>
    </header>

    <main>
        <section class="coming-soon-section">
            <div class="coming-soon-container">
                <div class="spinner"></div>
                <p class="coming-soon-text">Coming Soon</p>
            </div>
        </section>
    </main>

    <footer class="footer">
        <div class="container">
            <p>&copy; 2024 Bookish. All rights reserved.</p>
        </div>
    </footer>

    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>