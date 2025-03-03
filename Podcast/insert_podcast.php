<?php
include 'dbconnect2.php';
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
        echo "Error: " . $query . "<br>" . $conn->error;
    }
}

echo "Podcasts inserted successfully.";
$conn->close();
?>