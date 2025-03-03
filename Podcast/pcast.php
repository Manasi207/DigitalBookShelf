<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'dbconnect2.php';

// Check for database connection errors
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Podcast insertion logic
$result = $conn->query("SELECT COUNT(*) as count FROM podcast1");
if (!$result) {
    die("Query Failed: " . $conn->error);
}
$row = $result->fetch_assoc();

// Only insert podcasts if the table is empty
if ($row['count'] == 0) { // Change from >= 0 to == 0
    $podcasts = [
        ['title' => 'Ikigai', 'audio_file' => 'episode1.mp3', 'iframe_url' => 'https://open.spotify.com/embed/show/3JpFZV2C7XRKOxAfOOH09h', 'description' => 'Podcast about Ikigai.'],
        ['title' => 'Atomic Habits', 'audio_file' => 'episode2.mp3', 'iframe_url' => 'https://open.spotify.com/embed/episode/6n85fPGHx20CrzKrA9Afkk', 'description' => 'Podcast discussing habits and personal development.'],
        ['title' => 'How to Talk to Anyone', 'audio_file' => 'episode3.mp3', 'iframe_url' => 'https://open.spotify.com/embed/episode/0XiEeNXjt60KSZSoNy2QPr', 'description' => 'Learn strategies for improving social skills.'],
        ['title' => 'The Story of Indian Startups', 'audio_file' => 'episode4.mp3', 'iframe_url' => 'https://open.spotify.com/embed/playlist/37i9dQZF1DWWYU1hafNQFA', 'description' => 'Insights into the Indian startup ecosystem.'],
        ['title' => 'Money Matters', 'audio_file' => 'episode5.mp3', 'iframe_url' => 'https://open.spotify.com/embed/playlist/37i9dQZF1DX00fuhzH2zuj', 'description' => 'Understanding financial management and investment.']
    ];
    
    // Insert each podcast into the database
    foreach ($podcasts as $podcast) {
        $title = $conn->real_escape_string($podcast['title']);
        $audio_file = $conn->real_escape_string($podcast['audio_file']);
        $iframe_url = $conn->real_escape_string($podcast['iframe_url']);
        $description = $conn->real_escape_string($podcast['description']);
        
        $query = "INSERT INTO podcast1 (title, audio_file, iframe_url, description) VALUES ('$title', '$audio_file', '$iframe_url', '$description')";
        
        if ($conn->query($query) !== TRUE) {
            echo "Error inserting podcast '$title': " . $conn->error . "<br>"; // Enhanced error logging
        } else {
            echo "Inserted: " . $title . "<br>"; // Confirmation of successful insertion
        }
    }
    
    echo "Podcasts inserted successfully.";
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Podcast Landing Page</title>
    <link rel="stylesheet" href="pcast.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600&display=swap" rel="stylesheet">

</head>

<body>
    <header class="header">
        <div class="container">
            <a href="../CommingSoon/coming-soon.html" class="logo"><ion-icon name="book-sharp"></ion-icon>Bookshelf</a>
            <nav class="nav" id="navbar">
                <a href="#podcasts" class="navbar">Podcasts</a>
                <a href="#featured" class="navbar">Featured</a>
                <a href="#about" class="navbar">About</a>
                <a href="#contact" class="navbar">Contact</a>
            </nav>
            <button class="hamburger" id="hamburger">
                <ion-icon name="menu-outline"></ion-icon>
            </button>
            <div class="search-box">
                <div class="search-container">
                    <input type="text" id="search" class="search-bar" placeholder="Search for podcasts..." autocomplete="off">
                    <div id="podcastlist"></div>
                    <button type="button" class="search-btn" id="searchbutton"><ion-icon name="search-outline"></ion-icon></button>
                    <button onclick="voice()" class="voice-search" id="voicesearch"><ion-icon name="mic-outline"></ion-icon></button>
                </div>
                <div class="result-box">
                    <!-- <ul>
                   <li>ikigai</li>
                </ul> -->
                </div>

            </div>
    </header>

    <main>
        <section class="hero">
            <div class="container">
                <h1>Welcome to Bookshelf Podcasts</h1>
                <p>Your favorite podcasts about books, authors, and the power of reading.</p>
                <a href="#podcasts" class="cta-button">Listen Now</a>
            </div>
        </section>

        <section class="podcasts" id="podcasts">
            <div class="container">
                <h2>Latest Podcasts</h2>
                <div class="podcast-wrapper" id="podcastList">
                    <?php
                        $result = $conn->query("SELECT * FROM podcast1");
                        while($row = $result->fetch_assoc()) {
                            echo '<div class="podcast-episode" data-title="'.$row['title'].'">';
                            echo '<h3>'.$row['title'].'</h3>';
                            echo '<iframe src="'.$row['iframe_url'].'" width="100%" height="352"></iframe>';
                            echo '<audio controls><source src="'.$row['audio_file'].'" type="audio/mpeg"></audio>';
                            echo '</div>';
                        }
                        
                        ?>
                    <div class="podcast-episode" data-title="Ikigai">
                        <h3>Ikigai</h3>
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/show/3JpFZV2C7XRKOxAfOOH09h?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                        <audio controls>
                            <source src="episode1.mp3" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                    <div class="podcast-episode" data-title="Atomic Habits">
                        <h3>Atomic Habits</h3>
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/episode/6n85fPGHx20CrzKrA9Afkk?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen="" allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                        <audio controls>
                            <source src="episode2.mp3" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                    <div class="podcast-episode">
                        <!-- <img src="../img1_files/reading_habits.jpg" alt="Episode 3" class="podcast-image"> -->
                        <h3>How to talk to anyone</h3>
                        <!-- <p>Learn strategies for making reading a daily habit.</p> -->
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/episode/0XiEeNXjt60KSZSoNy2QPr?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen=""
                            allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                        <audio controls>
                            <source src="episode3.mp3" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                    <div class="podcast-episode">
                        <!-- <img src="../img1_files/reading_habits.jpg" alt="Episode 3" class="podcast-image"> -->
                        <h3>The story of Indian Startups</h3>
                        <!-- <p>Learn strategies for making reading a daily habit.</p> -->
                        <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZF1DWWYU1hafNQFA?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen=""
                            allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                        allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                        <audio controls>
                            <source src="episode4.mp3" type="audio/mpeg">
                            Your browser does not support the audio element.
                        </audio>
                    </div>
                </div>
            </div>
        </section>

        <section class="featured" id="featured"></section>
        <div class="featured-container">
            <h2>Featured Podcast</h2>
            <div class="featured-podcast">
                <!-- <img src="../img1_files/exploringWorlds.jpg" alt="Featured Podcast" class="featured-image"> -->
                <div class="featured-info">
                    <h3>Money Matters</h3>
                    <!-- <p>Join us as we dive into the fascinating worlds created by contemporary authors.</p> -->
                    <iframe style="border-radius:12px" src="https://open.spotify.com/embed/playlist/37i9dQZF1DX00fuhzH2zuj?utm_source=generator" width="100%" height="352" frameBorder="0" allowfullscreen=""
                        allow="autoplay; clipboard-write; encrypted-media; fullscreen; picture-in-picture" loading="lazy"></iframe>
                    <audio controls>
                        <source src="episode4.mp3" type="audio/mpeg">
                        Your browser does not support the audio element.
                    </audio>
                </div>
            </div>
        </div>
        </section>

        <section class="about" id="about">
            <div class="container">
                <h2>About Us</h2>
                <p>Bookshelf is your go-to podcast for everything books. We bring you insightful discussions, interviews with authors, and recommendations to help you discover your next great read.</p>
            </div>
        </section>

        <section class="testimonials">
            <div class="container">
                <h2>What Our Listeners Say</h2>
                <blockquote>"The Bookshelf podcast opened my eyes to so many great authors. I can't get enough!"</blockquote>
                <blockquote>"I love how each episode is so informative and engaging. Keep up the great work!"</blockquote>
            </div>
        </section>

        <section class="subscribe">
            <div class="container">
                <h2>Subscribe to Our Newsletter</h2>
                <form id="subscribe-form" action="subscribe.php" method="POST">
                    <input type="email" name="email" placeholder="Enter your email" required>
                    <button type="submit">Subscribe</button>
                </form>
            </div>
        </section>

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
    </main>

    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
    <script src="./pcast.js"></script>
</body>

</html>