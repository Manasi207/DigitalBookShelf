

const messagesContainer = document.getElementById('messages');
const userInput = document.getElementById('user-input');
const sendButton = document.getElementById('send-btn');
const chatbot = document.getElementById('chatbot');
const chatIcon = document.getElementById('chat-icon');
const closeBtn = document.getElementById('close-btn'); // Close button
const tooltip = document.getElementById('tooltip');
const micButton = document.getElementById('mic-btn'); // Microphone button

let isMicActive = false;
let isBotResponding = false; // Track bot response state

// Toggle chatbot visibility
function toggleChat() {
    chatbot.classList.toggle('hidden');
    chatIcon.classList.toggle('hidden');
    closeBtn.classList.toggle('hidden');
    tooltip.classList.toggle('hidden');

    // Stop recognition if chatbot is closed
    if (chatbot.classList.contains('hidden') && isMicActive) {
        recognition.stop();
        isMicActive = false; // Reset microphone state
    }
}

// Sample responses for the chatbot
const responses = {
    "hi": "Hello! How can I assist you with our digital library today?",
    "what is bookshelf": "Bookshelf is your go-to platform for discovering, purchasing, and reading a wide variety of eBooks across different genres.",
    "hello": "Hello! How can I assist you with our digital library today?",
    "can i read ebooks offline": "Yes, once you download an eBook from your library, you can access it offline through our app or your preferred reading software.",
    "can i search for books using my voice?": "Yes! Just click on the microphone icon in the search bar and search for the book you want.",
    "how do i browse ebooks on bookshelf": "You can browse eBooks by searching for specific titles using the search bar at the top of the homepage.",
    "which books do you prefer": "We have a variety of books in genres such as Fiction, Non-Fiction, Science, and more.",
    "how can i contact customer support": "You can contact our customer support team by emailing us at support@bookshelf.com",
    "bye": "Goodbye! Have a great day!",
    "thank you": "You're welcome! If you need any further assistance, just ask!",
    // Add more variations or keywords to handle similar queries
};

// Event listener for send button (for text input)
sendButton.addEventListener('click', () => {
    const userText = userInput.value.trim(); // Trim whitespace
    if (userText) {
        displayMessage(userText, 'user');
        userInput.value = '';
        getBotResponse(userText);
    }
});

// Allow pressing 'Enter' to send the message
userInput.addEventListener('keypress', (e) => {
    if (e.key === 'Enter') {
        sendButton.click();
    }
});

// Function to display messages
function displayMessage(text, sender) {
    const messageDiv = document.createElement('div');
    messageDiv.classList.add('message', sender);
    messageDiv.textContent = text;
    messagesContainer.appendChild(messageDiv);
    messagesContainer.scrollTop = messagesContainer.scrollHeight; // Scroll to the bottom
}

// Function to get the bot response
function getBotResponse(userText) {
    const cleanedText = userText.toLowerCase().trim().replace(/[^\w\s]/gi, ''); // Removes punctuation

    const botResponse = responses[cleanedText] || "I'm sorry, I don't understand that. Could you rephrase?";

    // Pause voice recognition while responding
    if (isMicActive) {
        stopVoiceInput(); // Temporarily stop microphone while bot responds
    }

    setTimeout(() => {
        displayMessage(botResponse, 'bot');
        speakResponse(botResponse); // Bot responds with speech
    }, 1000); // Simulate a delay for response
}

/* Voice Interaction - Speech Synthesis for Bot Response */
function speakResponse(responseText) {
    const speech = new SpeechSynthesisUtterance();
    speech.text = responseText;
    speech.volume = 1;
    speech.rate = 1;
    speech.pitch = 1;
    window.speechSynthesis.speak(speech);

    // Reactivate voice input after bot response is finished
    speech.onend = () => {
        console.log("Bot response completed. Reactivating microphone.");
        startVoiceInput(); // Automatically reactivate voice input
    };
}

/* Voice Input using Web Speech API */
const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
const recognition = new SpeechRecognition();

recognition.continuous = true; // Allow continuous speech recognition
recognition.interimResults = false; // Do not show interim results

recognition.onstart = function() {
    console.log("Voice recognition started.");
    isMicActive = true; // Set microphone active state
    micButton.classList.add('active'); // Add active class for red color
    micButton.classList.add('vibrate'); // Add the vibrate class
};

recognition.onresult = function(event) {
    const transcript = event.results[event.results.length - 1][0].transcript.toLowerCase().trim().replace(/[^\w\s]/gi, ''); // Clean transcript
    console.log("User said: ", transcript);
    displayMessage(transcript, 'user'); // Display user input from voice
    getBotResponse(transcript); // Get bot response
};

// Start voice input on mic button click
micButton.addEventListener('click', () => {
    if (!isMicActive) {
        recognition.start(); // Start listening
    }
});

// Function to stop voice input
function stopVoiceInput() {
    recognition.stop(); // Stop recognition
    isMicActive = false; // Reset microphone state
    micButton.classList.remove('active'); // Remove active class
    micButton.classList.remove('vibrate'); // Remove the vibrate class
}

// Automatically restart voice recognition after bot response
recognition.onend = function() {
    if (!isBotResponding) {
        console.log("Voice recognition stopped, reactivating.");
        startVoiceInput(); // Automatically restart listening if not responding
    } else {
        console.log("Bot is still responding, microphone remains off.");
    }
};

// Start voice input again after bot's speech response
function startVoiceInput() {
    if (!isBotResponding && !isMicActive) {
        recognition.start();
    }
}
