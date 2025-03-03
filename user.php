<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bookshelf - Accessible for Blind</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: hsl(20, 43%, 93%);
        }
    </style>
</head>
<body>

<!-- No visible welcome text here -->

<script>
    // Function to speak text
    function speak(text) {
        if ('speechSynthesis' in window) {
            const utterance = new SpeechSynthesisUtterance(text);
            utterance.lang = 'en-US';
            utterance.volume = 1; // Volume range from 0 to 1
            utterance.rate = 1; // Speed of speech (0.1 to 10)
            utterance.pitch = 1; // Pitch of the voice (0 to 2)

            // Speak the text
            speechSynthesis.speak(utterance);
        } else {
            console.error("Speech synthesis not supported in this browser.");
        }
    }

    // Function to handle key presses for options
    function handleOptions(event) {
        switch (event.key) {
            case '2': 
                speak("You have chosen to search for a book.");
                break;
            case '3':
                speak("Opening download modal.");
                break;
            case '4':
                speak("Redirecting to view the book.");
                break;
            case '0':
                speak("Going back to the previous page.");
                window.history.back();
                break;
            default:
                break;
        }
    }

    // Wait for voices to load and speak welcome text without displaying it
    window.addEventListener('load', function() {
        window.speechSynthesis.onvoiceschanged = function() {
            // Speak welcome message without displaying it
            speak("Welcome to the bookshelf. Press 1 to explore options. Press 2 to search, 3 to download a book, or 4 to view the book. Press 0 to go back.");

            // Add keydown event listener for options
            document.addEventListener('keydown', function(event) {
                if (event.key === '1') {
                    speak("You have chosen to explore options. Press 2 to search, 3 to download a book, or 4 to view the book.");
                } else {
                    handleOptions(event); // Handle other options
                }
            });
        };
    });
</script>

</body>
</html>
