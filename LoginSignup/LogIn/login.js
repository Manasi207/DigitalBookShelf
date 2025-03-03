// document.querySelector('.login-form').addEventListener('submit', function (event) {
//     event.preventDefault();
  
//     clearErrors();
  
    // const staticUsername = 'komal@gmail.com';
    // const staticPassword = 'admin@123';
  
    // Use 'let' to allow reassignment
//     let email = document.getElementById('email').value;
//     let password = document.getElementById('password').value;
  
//     // Sanitize input (remove spaces)
//     email = email.trim().replace(/\s+/g, '').replace(/[\s\u00A0]+/g, '');
//     password = password.trim().replace(/\s+/g, '').replace(/[\s\u00A0]+/g, '');
  
//     console.log("Sanitized email:", email); // Log to check if spaces are still present
//     console.log("Sanitized password:", password);
//     // document.getElementById('email').value = email;
//     // document.getElementById('password').value = password
  
//     let isValid = true;
  
//     if (email !== staticUsername) {
//       showError('email-error', 'Invalid email address.');
//       isValid = false;
//     }
  
//     if (password !== staticPassword) {
//       showError('password-error', 'Incorrect password.');
//       isValid = false;
//     }
  
//     if (isValid) {
//       alert('Login successful! Redirecting to the homepage...');
//       window.location.href = '../LogIn/login.php';
//     }
//   });

 
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
          voiceInput = voiceInput.replace(/\badd\b/g, "@");  // Replace "at" with "@"
          voiceInput = voiceInput.replace(/\band\b/g, "@");  // Replace "at" with "@"
          voiceInput = voiceInput.replace(/\bdot\b/g, "."); // Replace "dot" with "."


          voiceInput = voiceInput.replace(/\s*@\s*/g, "@");  // Removes spaces around "@"
          voiceInput = voiceInput.replace(/\s*\.\s*/g, ".");
      }
      if (inputId === "password") {
          voiceInput = voiceInput.toLowerCase(); // Email should be lowercase
          
          // Replace common phrases with email symbols
          voiceInput = voiceInput.replace(/\bat\b/g, "@");  // Replace "at" with "@"
          voiceInput = voiceInput.replace(/\badd\b/g, "@");  // Replace "at" with "@"
          voiceInput = voiceInput.replace(/\band\b/g, "@");  // Replace "at" with "@"
          voiceInput = voiceInput.replace(/\bdot\b/g, "."); // Replace "dot" with "."


          voiceInput = voiceInput.replace(/\s*@\s*/g, "@");  // Removes spaces around "@"
          voiceInput = voiceInput.replace(/\s*\.\s*/g, ".");
      }

      const inputBox = document.getElementById(inputId); // Get the input element
      inputBox.value = voiceInput; // Set the value from the transcript

      // Trigger 'input' or 'keyup' event after setting the value
      let inputEvent = new Event('input');
      inputBox.dispatchEvent(inputEvent); // Trigger event to ensure other listeners are updated
  };

  recognition.onerror = function (event) {
      console.error("Speech recognition error: ", event.error);
      alert("Error occurred in speech recognition: " + event.error);
  };

  recognition.start();
}
