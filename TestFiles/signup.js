document.getElementById('signup-form').addEventListener('submit', function (event) {
    event.preventDefault();
    clearErrors();

    const name = document.getElementById('name').value.trim();
    const email = document.getElementById('email').value.trim().replace(/\s+/g, '');
    const password = document.getElementById('password').value.trim();
    const confirmPassword = document.getElementById('confirm-password').value.trim();

    let isValid = true;

    if (name === '') {
        showError('name-error', 'Name is required.');
        isValid = false;
    }


    const emailPattern =  /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    //   let isValid = true;

    if (!emailPattern.test(email)) {
        showError('email-error', 'Please enter a valid email address.');
        isValid = false;
    } else {
        showError('email-error', ''); // Clear the error message if valid
    }

    function showError(elementId, message) {
        const errorElement = document.getElementById(elementId);
        errorElement.textContent = message;
        errorElement.style.color = 'red';
    }

    if (password.length < 6) {
        showError('password-error', 'Password must be at least 6 characters long.');
        isValid = false;
    }

    if (password !== confirmPassword) {
        showError('confirm-password-error', 'Passwords do not match.');
        isValid = false;
    }

    if (isValid) {
        alert('Sign-up successfully! Redirecting to login page...');
        window.location.href = '../index.html';
    }
});

function showError(elementId, message) {
    const errorElement = document.getElementById(elementId);
    errorElement.textContent = message;
    errorElement.style.color = 'red';
}

function clearErrors() {
    const errorElements = document.querySelectorAll('.error-message');
    errorElements.forEach(element => {
        element.textContent = '';
    });
}
function voice(inputId) {
    if (!('webkitSpeechRecognition' in window)) {
        alert("Your browser does not support speech recognition");
        return;
    }
    var recognition = new webkitSpeechRecognition();
    recognition.lang = "en-GB";
    recognition.interimResults = false;
    recognition.maxAlternatives = 1;

    recognition.onresult = function (event) {
        console.log(event);
        let voiceInput = event.results[0][0].transcript;

        if (inputId === "email") {
            voiceInput = voiceInput.toLowerCase(); // Email should be lowercase

            // Replace common phrases with email symbols
            voiceInput = voiceInput.replace(/\bat\b/g, "@");  // Replace "at" with "@"
            voiceInput = voiceInput.replace(/\bdot\b/g, "."); // Replace "dot" with "."

            // You can add more replacements as necessary, depending on common errors
        }
        document.getElementById(inputId).value = voiceInput;
        let inputEvent = new Event('keyup');
        inputBox.dispatchEvent(inputEvent);
    }
    recognition.onerror = function (event) {
        console.error("Speech recognition error: ", event.error);
        alert("Error occurred in speech recognition: " + event.error);
    };
    recognition.start();

}