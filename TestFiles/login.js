document.querySelector('.login-form').addEventListener('submit', function (event) {
  event.preventDefault();

  clearErrors();

  const staticUsername = 'komalnalage@gmail.com';
  const staticPassword = 'admin@123';

  const email = document.getElementById('email').value.trim().replace(/\s+/g, '');
  const password = document.getElementById('password').value.trim();

  let isValid = true;

  if (email !== staticUsername) {
    showError('email-error', 'Invalid email address.');
    isValid = false;
  }

  if (password !== staticPassword) {
    showError('password-error', 'Incorrect password.');
    isValid = false;
  }

  if (isValid) {
    alert('Login successful! Redirecting to the homepage...');
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